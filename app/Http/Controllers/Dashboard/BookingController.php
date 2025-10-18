<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Booking;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\BookingRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::filter()->latest()->paginate();

        return view('dashboard.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\BookingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookingRequest $request)
    {
        $booking = Booking::create($request->all());

        flash()->success(trans('bookings.messages.created'));

        return redirect()->route('dashboard.bookings.show', $booking);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('dashboard.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('dashboard.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\BookingRequest $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->update($request->all());

        flash()->success(trans('bookings.messages.updated'));

        return redirect()->route('dashboard.bookings.show', $booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        flash()->success(trans('bookings.messages.deleted'));

        return redirect()->route('dashboard.bookings.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Booking::class);

        $bookings = Booking::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.bookings.trashed', compact('bookings'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Booking $booking)
    {
        $this->authorize('viewTrash', $booking);

        return view('dashboard.bookings.show', compact('booking'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Booking $booking)
    {
        $this->authorize('restore', $booking);

        $booking->restore();

        flash()->success(trans('bookings.messages.restored'));

        return redirect()->route('dashboard.bookings.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Booking $booking)
    {
        $this->authorize('forceDelete', $booking);

        $booking->forceDelete();

        flash()->success(trans('bookings.messages.deleted'));

        return redirect()->route('dashboard.bookings.trashed');
    }
}
