<?php

namespace App\Models\Translations;

use App\Models\Helpers\HasLocalizedSlug;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasLocalizedSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'slug', 'meta_description', 'meta_keywords'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
