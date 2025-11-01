<?php

namespace App\Http\Controllers\Frontend;

use App\Events\FeedbackSent;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\FrontOrderRequest;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Notifications\NewOrderNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;
use Settings;

class FrontendController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = "Home Page";
        $recentlyArrived = Product::active()->orderBy('id', 'desc')->with('category')->website()->take(6)->get();
        $offers = Product::active()->with('category')
            ->website()
            ->whereNotNull('old_price')
            ->whereColumn('old_price', '>', 'price') // فيه خصم فعلي
            ->orderByRaw('(old_price - price) DESC') // فرق السعر
            ->take(12)
            ->get();
        $bestSellers = Product::active()->where('best_seller', 1)->website()->with('category')->orderBy('id', 'desc')->take(6)->get();
        // $categories = $this->mergeServicesToCategories();
        $categories = Category::parents()->get();
        $posts = Post::limit(value: 3)->orderBy('id', 'desc')->get();
        $sliders = Slider::all();

        return view('frontend.home', compact('title', 'recentlyArrived', 'offers', 'bestSellers', 'categories', 'posts', 'sliders'));
    }

    public function post(Post $post)
    {
        $title = $post->name;

        return view('frontend.post', compact('title', 'post'));
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function about()
    {
        $title = "About Us";
        $teams = Team::all();
        $galleries = Gallery::all();

        return view('frontend.about', compact('title', 'teams', 'galleries'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact()
    {
        $title = "Contact Us";

        return view('frontend.contact2', compact('title'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        $title = "Login";

        return view('frontend.auth.login', compact('title'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        $title = "registration";

        $cities = \App\Models\City::whereHas('country', function ($query) {
            $query->where('code', 'eg');
        })->get()->pluck('name', 'id')->toArray();

        // ترتيب المدن أبجديًا
        asort($cities);

        return view('frontend.auth.registration', compact('title', 'cities'));
    }


    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactStore(ContactRequest $request)
    {
        $feedback = Feedback::create($request->all());

        event(new FeedbackSent($feedback));

        // flash(trans('feedback.messages.sent'))->success();
        flash()->overlay(" ", trans('feedback.messages.sent'));

        return redirect()->back()->with('success', trans('feedback.messages.sent'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function payment(Order $order)
    {
        $request = request();

        $redirectSuccess = route('success', $order);
        $redirectFail = route('failed');

        $name = $order->name . " Order";

        $data = [
            //            "payment_method_id" => 2,
            "cartTotal" => $request->total,
            "currency" => 'EGP',
            "customer" => [
                "first_name" => $request->name,
                "last_name" => '.',
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address
            ],
            "redirectionUrls" => [
                "successUrl" => $redirectSuccess,
                "failUrl" => $redirectFail,
                "pendingUrl" => $redirectSuccess
            ],
            "cartItems" => [
                [
                    "name" => $name,
                    "price" => $request->total,
                    "quantity" => "1"
                ],
            ]
        ];

        //        dd(json_encode($data));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('fawaterk.url') . '/api/v2/createInvoiceLink', //change for production
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: ' . config('fawaterk.key')
            ),
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $data = json_decode($response);
        if ($data->status == "success") {
            $url = $data->data->url;
            $invoice_id = $data->data->invoiceId;


            /**
             * @var Invoice $invoice
             */
            $invoice = Invoice::create(
                [
                    'customer_id' => auth()->id(),
                    'total' => $order->total,
                    'url' => $data->data->url,
                    'api_invoice_id' => $invoice_id,
                    'status' => !empty($data->data->paid) ? Invoice::STATUS_PAID : Invoice::STATUS_PENDING,
                ]
            );

            $order->forceFill(['invoice_id' => $invoice->id])->save();
        }

        curl_close($curl);

        header("Location: " . $data->data->url . "?url=" . $url . "&invoice_id=" . $invoice_id . "&guest_id=" . $request->guest_id);
        exit();
    }

    public function payWithValu(Order $order)
    {
        echo $order;
    }
    public function getInvoiceData($invoice)
    {
        //stop here

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('fawaterk.url') . '/api/v2/getInvoiceData/' . $invoice,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: ' . config('fawaterk.key') //change for production
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        if ($data && $data->status == 'success') {
            $data = (array) json_decode($response)->data;

            $data += ['url' => $FAWATERK_URL . "/invoice/" . $invoice . "/" . $data['invoice_key']];
        } else {
            return null;
        }

        return $data;
    }

    public function setOrder(Request $request)
    {
        $cartItems = $request->input('cartItems', []);
        $fixedItems = [];
        $notes = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                $notes[] = __('cart.product_not_found', ['id' => $item['id']]);
                continue;
            }

            if ($product->stock < 1) {
                $notes[] = __('cart.out_of_stock', ['name' => $product->name]);
                continue;
            }

            $originalQty = (int) $item['quantity'];
            $fixedQty = min($originalQty, $product->stock);

            if ($originalQty < 1) {
                $notes[] = __('cart.quantity_min_fixed', [
                    'name' => $product->name,
                    'original' => $originalQty
                ]);
            } elseif ($originalQty > $product->stock) {
                $notes[] = __('cart.quantity_max_fixed', [
                    'name' => $product->name,
                    'stock' => $product->stock
                ]);
            }

            if ($item['price'] != $product->price) {
                $notes[] = __('cart.price_updated', [
                    'name' => $product->name,
                    'oldPrice' => $item['price'],
                    'newPrice' => $product->price
                ]);
            }

            $fixedItems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $fixedQty,
                'image' => $item['image'] ?? null,
            ];
        }

        session()->put('cartItems', $fixedItems);
        session()->put('cartNotes', $notes);

        return response()->json([
            'message' => __('cart.updated_successfully'),
            'cartItems' => $fixedItems,
            'notes' => $notes,
        ]);
    }


    public function showOrderPage(Request $request)
    {
        $branches = Branch::all();
        $areas = Area::orderBy('position')->whereHas('city.country', function ($query) {
            $query->where('code', 'eg');
        })->get();
        $cartItems = session()->get('cartItems');
        //this for make sure that cartItems is not null and not old data

        if (!$cartItems) {
            return redirect()->route('front.cart.checkout');
        }

        $percentageDiscount = 0;



        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        $discount = Order::getOrderDiscount($totalPrice);

        $finalTotal = $totalPrice - $discount;

        // Get user's city_id if authenticated
        $userCityId = auth()->check() ? auth()->user()->city_id : null;
        return view('frontend.cart.order', compact('cartItems', 'percentageDiscount', 'finalTotal', 'totalPrice', 'discount', 'branches', 'areas', 'userCityId'));
    }


    /**
     * @param FrontOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processOrder(FrontOrderRequest $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
            'discount' => Order::getOrderDiscount($request->total),
            'delivery_price' => $request->delivery_price
        ]);

        /**
         * @var Order $order
         */
        $order = Order::create($request->all());

        if ($request->payment_method == Order::ONLINE) {
            $this->payment($order);
        }
        if ($request->payment_method == Order::CASH_ON_DELIVERY||$request->payment_method == Order::VISA_ON_DELIVERY) {//||$request->payment_method == Order::VISA_ON_DELIVERY
            // $this->payWithValu($order);
            // return true;
        }
info($request->all());
        if ($request->hasFile('recipt'))
            $order->addMediaFromRequest('recipt')->toMediaCollection('recipt');

        Notification::send(Admin::get(), new NewOrderNotification($order));

        flash()->overlay(" ", trans('feedback.messages.created'));

        return redirect()->route('success', $order);
    }


    public function failed()
    {
        return view('frontend.failed');
    }

    public function success(Order $order)
    {
        if (!$order->invoice) {
            /**
             * @var Invoice $invoice
             */
            $invoice = Invoice::create(
                [
                    'customer_id' => $order->user_id,
                    'total' => $order->total,
                ]
            );

            $order->forceFill(['invoice_id' => $invoice->id])->save();
        }
        // $order->user->sendEmail('welcome');

        return view('frontend.success');
    }
    public function terms()
    {
        $page = Page::where('id', Settings::get('terms'))->first();
        return view('frontend.terms', compact('page'));
    }

    public function privacy()
    {
        $page = Page::where('id', Settings::get('privacy'))->first();
        return view('frontend.privacy', compact('page'));
    }

    public function shippingPolicy()
    {
        $page = Page::where('id', Settings::get('shipping_policy'))->first();
        return view('frontend.shipping_policy', compact('page'));
    }

    public function returnPolicy()
    {
        $page = Page::where('id', Settings::get('return_policy'))->first();
        return view('frontend.return_policy', compact('page'));
    }

    private function mergeServicesToCategories()
    {
        $categories = Category::parents()->get();
        $services = Service::where('home', 1)->get();

        // دمج المجموعتين مع تمييز كل عنصر بنوعه
        $items = collect();

        foreach ($categories as $cat) {
            $items->push([
                'type' => 'category',
                'id' => $cat->id,
                'name' => $cat->name,
                'image' => $cat->getFirstMediaUrl('image'),
                'url' => route('front.shop', ['category_id' => $cat->id]),
            ]);
        }

        foreach ($services as $srv) {
            $items->push([
                'type' => 'service',
                'id' => $srv->id,
                'name' => $srv->name,
                'image' => $srv->getFirstMediaUrl('home_icon'),
                'url' => route('front.services'),
            ]);
        }

        return $items;
    }
}
