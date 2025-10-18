<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Http\Filters\CategoryFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;
    use Filterable;
    use HasUploader;
    use Selectable;
    use SoftDeletes;

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


    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'slug', 'meta_description', 'meta_keywords'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'active',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = CategoryFilter::class;

    public function getDepthAttribute()
    {
        $depth = 0;
        $category = $this;

        // Traverse up the parent chain
        while ($category && $category->parent_id) {
            $category = $category->parent;
            $depth++;
        }

        return $depth;
    }

    public function getTreeAttribute()
    {
        $parent = $this->parent;

        return $parent ? $parent->tree . ' > ' . $this->name : $this->name;
    }

    public function getMainParentAttribute()
    {
        // بداية من الفئة الحالية
        $category = $this;

        // الانتقال عبر السلسلة من الفئات الأبوية حتى نصل للفئة الأم الأساسية (التي ليس لها parent)
        while ($category->parent) {
            $category = $category->parent;
        }

        // إرجاع السلسلة التي تبدأ من الفئة الأم الأساسية وصولاً إلى الفئة الحالية
        return $category;
    }


    // parent scope
    public function scopeParents(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    // active scope
    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
