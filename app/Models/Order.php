<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\OrderFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PDO;

class Order extends Model
{
    use HasFactory;
    use Filterable;
    use Selectable;

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = OrderFilter::class;

    const STATUS_PENDING = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_SHIPPED = 2;
    const STATUS_DELIVERED = 3;
    const STATUS_CANCELLED = 4;
    const STATUS_RETURNED = 5;
    const STATUS_COMPLETED = 6;

    const CASH_ON_DELIVERY = 1;
    const ONLINE = 2;
    const VISA_ON_DELIVERY = 3;

    const DELIVERY_METHOD_PICKUP = 'pickup';
    const DELIVERY_METHOD_DELIVERY = 'delivery';

    const ALEXANDRIA_CITY_ID = 24;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'items',
        'user_id',
        'status',
        'total',
        'discount',
        'payment_method',
        'branch_id',
        'delivery_method',
        'delivery_price',
        'area_id'
    ];

    public function getItemsAttribute($value)
    {
        return json_decode($value);
    }

    public static function getOrderDiscount($toalPrice): float
    {
        $percentageDiscount = 0;

        if (auth()->check() && auth()->user()->orders()->count() == 0) {
            $percentageDiscount += 10; //first order 10% discount
        }

        $discount = $toalPrice * ($percentageDiscount / 100);

        return $discount;
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
