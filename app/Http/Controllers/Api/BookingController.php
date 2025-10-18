<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\BookingResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $bookings = Booking::filter()->simplePaginate();

        return BookingResource::collection($bookings);
    }

    /**
     * Display the specified booking.
     *
     * @param \App\Models\Booking $booking
     * @return \App\Http\Resources\BookingResource
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $bookings = Booking::filter()->simplePaginate();

        return SelectResource::collection($bookings);
    }
}
