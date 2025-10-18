<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\SectionFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Section extends Model
{
    use HasFactory, Translatable, Filterable;

    protected $fillable = ['service_id'];

    public $translatedAttributes = ['name'];


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = SectionFilter::class;


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function inputs()
    {
        return $this->hasMany(Input::class);
    }
}
