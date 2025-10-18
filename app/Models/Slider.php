<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Http\Filters\SliderFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract, HasMedia
{
    use HasFactory, Translatable, Filterable, InteractsWithMedia, HasUploader;

    protected $fillable = ['__token'];

    public $translatedAttributes = ['paragraph', 'paragraph2'];


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = SliderFilter::class;

}
