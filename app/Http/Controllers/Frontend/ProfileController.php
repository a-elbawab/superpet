<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of available services.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $title = trans('services.profile');
        $latestOrders = $user->orders()->latest()->filter()->paginate();
        $latestBookings = $user->bookings()->latest()->filter()->paginate();

        return view('frontend.profile.show', compact('title', 'user', 'latestOrders', 'latestBookings'));
    }

    /**
     * Display a single service and allow booking.
     *
     * @param Service $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request)
    {
        $user = auth()->user();

        $cities = \App\Models\City::whereHas('country', function ($query) use ($user) {
            $query->where('code', 'eg');
        })->get()->pluck('name', 'id')->toArray();

        return view('frontend.profile.edit', compact('user', 'cities'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'city_id' => 'required|string|exists:cities,id',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimetypes:image/jpeg,png,jpg|max:2048',
        ]);

        $user->update($validated);

        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')
                ->toMediaCollection('avatars');
        }

        return redirect()->back()->with('success', trans('frontend.profile.edit_success'));
    }

    public function orders()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $title = trans('orders.plural');

        $orders = $user->orders()->latest()->filter()->paginate();

        return view('frontend.profile.orders', compact('title', 'orders', 'user'));
    }

    public function bookings()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $title = trans('bookings.plural');

        $bookings = $user->bookings()->latest()->filter()->paginate();

        return view('frontend.profile.bookings', compact('title', 'bookings', 'user'));
    }

    public function deleteImage()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->hasMedia('avatars')) {
            $user->clearMediaCollection('avatars');
        }

        return response()->json(['message' => 'تم حذف الصورة بنجاح.']);
    }

    public function setOutStockNotify(Request $request)
    {
        $request->validate([
            'product' => 'required|exists:products,id',
        ]);

        /** @var \App\Models\User */
        $user = auth()->user();
        $exists = $user->hints()->where('product_id', $request->product)->notDone()->exists();

        if (!$exists) {
            $user->hints()->create([
                'product_id' => $request->product
            ]);
        }

        return response()->json(['message' => trans('hints.actions.create')]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function showOrder(Order $order)
    {
        $products = [];
        foreach ($order->items as $item) {
            $product = Product::find($item->id);
            if ($product) {
                $product->quantity = $item->quantity;
                $product->price = $item->price;
                $products[] = $product;
            }
        }

        $title = $order->title;

        return view('frontend.profile.order', compact('title', 'products', 'order'));
    }

    /**
     * Delete the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->route('front.me.orders.index')->with('success', trans('orders.messages.deleted'));
    }
}
