<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin;
use App\Models\Service;
use App\Notifications\NewBookingNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ServiceController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    /**
     * Display a list of available services.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = trans('services.plural');
        $services = Service::with('sections', 'sections.inputs')->filter()->orderBy('order')->paginate();

        return view('frontend.services.show', compact('title', 'services'));
    }

    /**
     * Display a single service and allow booking.
     *
     * @param Service $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function book(Request $request, Service $service)
    {
        // Separate file inputs from other inputs
        $fileInputs = [];
        $otherInputs = [];

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                $fileInputs[$key] = $request->file($key);
            } else {
                $otherInputs[$key] = $value;
            }
        }

        // Create the booking and store non-file inputs
        $booking = $service->bookings()->create([
            'inputs' => $otherInputs,
            'service_id' => $service->id,
            'user_id' => auth()->id(),
        ]);

        // Handle file inputs
        foreach ($fileInputs as $key => $file) {
            $booking->addMedia($file)->usingName($key)->toMediaCollection('files');
        }

        Notification::send(Admin::get(), new NewBookingNotification($booking));

        return redirect()->back()->with('success', trans('frontend.services.messages.booked'));
    }
}
