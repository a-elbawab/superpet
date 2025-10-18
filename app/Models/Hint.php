<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\HintFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hint extends Model
{
    use HasFactory;
    use Filterable;
    use Selectable;

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = HintFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'done'
    ];

    public function scopeDone($query)
    {
        return $query->where('done', true);
    }

    public function scopeNotDone($query)
    {
        return $query->whereNot('done', true);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
