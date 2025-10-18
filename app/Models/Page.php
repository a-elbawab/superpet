<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\PageFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, Translatable, Filterable;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'content'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = PageFilter::class;


    /**
     * Start Custom log.
     */

    // Customize log name
    protected static $logName = 'pages';

    // Only defined attribute will store in log while any change
    protected static $logAttributes = ['title'];

    // Customize log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Page has been {$eventName}";
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'page_id');
    }
}
