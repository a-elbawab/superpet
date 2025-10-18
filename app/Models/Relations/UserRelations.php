<?php

namespace App\Models\Relations;

use App\Models\Booking;
use App\Models\Hint;
use App\Models\Order;
trait UserRelations
{
    /**
     * Get orders.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function hints()
    {
        return $this->hasMany(Hint::class);
    }
}
