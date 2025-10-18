<?php

namespace App\Models;

use App\Http\Filters\BookingFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Booking extends Model implements HasMedia
{
    use HasFactory, Filterable, InteractsWithMedia;

    protected $fillable = [
        'service_id',
        'inputs',
        'user_id'
    ];

    protected $casts = [
        'inputs' => 'array', // Cast the inputs_data JSON field to an array
    ];


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = BookingFilter::class;


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
