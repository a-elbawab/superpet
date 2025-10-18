<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $table = 'slider_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['paragraph', 'paragraph2'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
