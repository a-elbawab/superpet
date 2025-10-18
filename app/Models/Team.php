<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\TeamFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use Filterable;
    use Selectable;
    use HasUploader;
    use InteractsWithMedia;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'title'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
    protected $filter = TeamFilter::class;
}
