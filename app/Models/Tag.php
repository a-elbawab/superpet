<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\TagFilter;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, Translatable, Filterable, Selectable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '__token',
    ];

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];


    protected $filter  = TagFilter::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];
}
