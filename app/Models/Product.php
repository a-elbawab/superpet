<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Http\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;
    use Filterable;
    use HasUploader;
    use Selectable;
    use SoftDeletes;
    use Searchable;


    public function resolveRouteBinding($value, $field = null)
    {
        if ($field === 'id') {
            return static::query()->whereKey($value)->first();
        }

        if (is_numeric($value)) {
            if ($byId = static::query()->whereKey($value)->first()) {
                return $byId;
            }
        }

        return static::query()
            ->whereHas('translations', fn($q) => $q->where('slug', $value))
            ->first();
    }



    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name_ar' => optional($this->translate('ar'))->name,
            'name_en' => optional($this->translate('en'))->name,
            'description_ar' => Str::limit(strip_tags(optional($this->translate('ar'))->description), 200),
            'description_en' => Str::limit(strip_tags(optional($this->translate('en'))->description), 150),
            'price' => $this->price,
            'image' => $this->main_image ?? asset('default-product.jpg'),
            'active' => $this->active,
        ];
    }

    public function shouldBeSearchable()
    {
        $hasChildren = $this->relationLoaded('products')
            ? $this->products->isNotEmpty()
            : $this->products()->exists();

        if (is_null($this->parent_id) && $hasChildren) {
            return false; // parent with children => exclude
        }

        $sellable = ($this->parent_id !== null) || ($this->price > 0);

        return $this->active && $sellable;
    }

    protected $filter = ProductFilter::class;

    public $translatedAttributes = ['name', 'description', 'slug', 'meta_description', 'meta_keywords'];

    protected $fillable = [
        'parent_id',
        'price',
        'old_price',
        'stock',
        'category_id',
        'sub_category_id',
        'sub_category_id2',
        'best_seller',
        'code',
        'active',
    ];

    protected $casts = [
        'stock' => 'integer',
        'price' => 'float',
    ];

    protected $with = ['media'];

    public function getMainImageAttribute()
    {
        if ($this->hasMedia('main_image')) {
            return $this->getFirstMediaUrl('main_image');
        } elseif ($this->parent && $this->parent->hasMedia('main_image')) {
            return $this->parent->getFirstMediaUrl('main_image');
        }
        return null;
    }

    public function getMainImageMediaAttribute()
    {
        if ($this->hasMedia('main_image')) {
            return $this->getFirstMedia('main_image');
        } elseif ($this->parent && $this->parent->hasMedia('main_image')) {
            return $this->parent->getFirstMedia('main_image');
        }
        return null;
    }

    public function getImagesAttribute()
    {
        $images = $this->hasMedia('images') ? $this->getMedia('images') : [];
        if ($mainImage = $this->getMainImageMediaAttribute()) {
            $images = collect([$mainImage])->merge($images);
        }
        return $images;
    }

    // Scopes
    public function scopeParents(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }

    public function scopeChildren(Builder $query): void
    {
        $query->whereNotNull('parent_id');
    }

    public function scopeWebsite(Builder $query): void
    {
        $query->where('price', '>', 0);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            if ($parent = $model->parent) {
                $parent->update(['stock' => 0, 'price' => 0]);
            }
            $model->tags()->sync(request('tags'));
        });

        static::updating(function ($model) {
            $model->tags()->sync(request('tags'));
        });

        static::deleting(function ($model) {
            $model->products()->unsearchable();
            $model->unsearchable();
            $model->products()->delete();
        });
    }

    protected static function booted()
    {
        static::saved(function (Product $product) {
            $product->shouldBeSearchable() ? $product->searchable() : $product->unsearchable();

            if (is_null($product->parent_id) && $product->isDirty('active') && $product->active == 0) {
                $product->products()->update(['active' => false]);
                $product->products()->unsearchable();
            }
        });

        static::restored(function (Product $product) {
            $product->products()->withTrashed()->restore();

            $product->shouldBeSearchable() ? $product->searchable() : $product->unsearchable();

            $product->products()->get()->each(function (Product $child) {
                $child->shouldBeSearchable() ? $child->searchable() : $child->unsearchable();
            });
        });
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categoryProducts()
    {
        return $this->hasMany(CategoryProduct::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function subCategories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'sub_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function subCategory2()
    {
        return $this->belongsTo(Category::class, 'sub_category_id2');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function attributes()
    {
        return $this->hasManyThrough(Attribute::class, ProductVariation::class);
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_product');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
}
