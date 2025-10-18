<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\OrderResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $orders = Order::filter()->simplePaginate();

        return OrderResource::collection($orders);
    }

    /**
     * Display the specified order.
     *
     * @param \App\Models\Order $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $orders = Order::filter()->simplePaginate();

        return SelectResource::collection($orders);
    }
}
