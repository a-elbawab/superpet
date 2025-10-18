<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\InvoiceFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Invoice extends Model implements HasMedia
{
    use HasFactory;
    use Filterable;
    use Selectable;
    use SoftDeletes;
    use HasUploader;
    use InteractsWithMedia;



    const STATUS_PENDING = 0;
    const STATUS_PAID = 1;
    const STATUS_CANCEL = 2;

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = InvoiceFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'status',
        'url',
        'total',
        'order_id',
        'api_invoice_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_product');
    }
}
