<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Http\Filters\Countries\AreaFilter;
use App\Models\Translations\AreaTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, Translatable, Filterable, SoftDeletes;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'shipping_price',
        'position',
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
     * The filter class name.
     *
     * @var string
     */
    protected $filter = AreaFilter::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * city translation model.
     * @var string
     */
    public $translationModel = AreaTranslation::class;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
