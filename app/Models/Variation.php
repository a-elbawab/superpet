<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Variation extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Filterable;
    use Selectable;

    protected $fillable = [
        'attribute_id',
    ];

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
