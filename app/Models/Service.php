<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Http\Filters\ServiceFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Translatable;

class Service extends Model implements TranslatableContract, HasMedia
{
    use HasFactory, Translatable, Filterable, InteractsWithMedia, HasUploader;

    protected $fillable = ['home', 'order'];

    public $translatedAttributes = ['name', 'description'];


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ServiceFilter::class;

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
