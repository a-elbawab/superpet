<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class ProductVariation extends Model implements HasMedia
{
    use HasFactory;
    use Filterable;
    use HasUploader;
    use Selectable;
    use InteractsWithMedia;

    protected $fillable = [
        'product_id',
        'variation_id',         // احتياطي أو أول قيمة من التركيبة
        'combination',          // الجديد: مصفوفة من variation_ids
        'price_override',       // سنعتمد عليه للسعر
        'quantity',             // سنستخدمه للمخزون
    ];

    protected $casts = [
        'combination' => 'array',
        'price_override' => 'float',
        'quantity' => 'integer',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function getCombinationTextAttribute()
    {
        return \App\Models\Variation::whereIn('id', $this->combination ?? [])
            ->pluck('name')
            ->implode(' + ');
    }

    public function combinationDetails()
    {
        return Variation::whereIn('id', $this->combination ?? [])->with('attribute')->get();
    }

}
