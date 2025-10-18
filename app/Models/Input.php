<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Input extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['section_id', 'name', 'type', 'required', 'order'];

    public function setOrderAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['order'] = $value;
            return;
        }
        
        $this->attributes['order'] = $this->section->inputs()->max('order') + 1;
    }

    public $translatedAttributes = ['label'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
