<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\AttributeFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Attribute extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;
    use Filterable;
    use HasUploader;
    use Selectable;

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = AttributeFilter::class;


    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '__token',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
