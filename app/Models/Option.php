<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\OptionFilter;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    use Filterable;
    use Selectable;
    use Translatable;

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = OptionFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'input_id',
        'value',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     * */
    public $translatedAttributes = [
        'name',
    ];

    public function input()
    {
        return $this->belongsTo(Input::class);
    }
}
