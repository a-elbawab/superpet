<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Owner;
use App\Models\Shop;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use App\Notifications\CustomNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Notifications\NotificationRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NotificationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate();

        return view('dashboard.notifications.index', compact('notifications'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //forget cities_option to avoid act in other requests
        session()->forget('customers_cities_option');
        session()->forget('providers_cities_option');

        return view('dashboard.notifications.create');
    }

    /**
     * @param NotificationRequest $request
     * @return RedirectResponse
     */
    public function store(NotificationRequest $request)
    {
        //send for customers
        if ($this->getCustomerNotifiables($request)) {
            $this->getCustomerNotifiables($request)->chunk(2, function ($notifiables) use ($request) {
                Notification::send(
                    $notifiables,
                    new CustomNotification([
                        'title' => $request->title,
                        'body' => $request->body,
                        'page_id' => $request->page_id,
                        'provider_id' => $request->provider_id,
                        'user_id' => (int) auth()->id(),
                    ])
                );
            });
        }

        // send for providers
        if ($this->getProviderNotifiables($request)) {
            $this->getProviderNotifiables($request)->chunk(2, function ($notifiables) use ($request) {
                Notification::send(
                    $notifiables,
                    new CustomNotification([
                        'title' => $request->title,
                        'body' => $request->body,
                        'page_id' => $request->page_id,
                        'provider_id' => $request->provider_id,
                        'user_id' => (int) auth()->id(),
                    ])
                );
            });
        }

        flash(trans('notifications.sent'));

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getCustomerNotifiables(Request $request)
    {
        $notifiables = null;

        if ($request->input('check_all_cities_customers') == 'on') {
            $notifiables = Customer::query();
        }

        if ($ids = $request->input('customers_notifiables', [])) {
            $notifiables = Customer::query();
            $notifiables = $notifiables->whereIn('id', $ids);
        }

        return $notifiables;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getProviderNotifiables(Request $request)
    {
        $notifiables = null;

        if ($request->input('check_all_cities_owners') == 'on') {
            $notifiables = Owner::query();
        }

        if ($ids = $request->input('owners_notifiables', [])) {
            $notifiables = User::query();
            $notifiables = $notifiables->whereIn('id', $ids);
        }

        return $notifiables;
    }

    /**
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(\App\Models\Notification $notification)
    {
        $notification->markAsRead();

        return view('dashboard.notifications.show', compact('notification'));
    }

    /**
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function markAllAsRead()
    {
        foreach (auth()->user()->notifications()->get() as $notification) {
            $notification->markAsRead();
        }

        return redirect()->route('dashboard.notifications.index');
    }

    /**
     * @param \App\Models\Notification $notification
     * @return RedirectResponse
     */
    public function destroy(\App\Models\Notification $notification)
    {
        auth()->user()->notifications()->where('id', $notification->id)->delete();

        flash(trans('notifications.messages.deleted'));

        return redirect()->route('dashboard.notifications.index');
    }
}
