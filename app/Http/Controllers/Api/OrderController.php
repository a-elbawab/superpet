<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\Order;
use App\Support\PaymentMethodValidator;
use Illuminate\Http\Request;
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

    /**
     * Get allowed payment methods based on delivery method and area/city.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function allowedPaymentMethods(Request $request)
    {
        $request->validate([
            'delivery_method' => 'required|string|in:' . implode(',', array_keys(trans('orders.delivery_methods'))),
            'area_id' => 'nullable|exists:areas,id',
            'city_id' => 'nullable|exists:cities,id',
        ]);

        $deliveryMethod = $request->input('delivery_method');
        $areaId = $request->input('area_id');
        $cityId = $request->input('city_id');

        // If area_id is provided, get city_id from area
        if ($areaId && !$cityId) {
            $area = Area::find($areaId);
            $cityId = $area ? $area->city_id : null;
        }

        // Get allowed payment methods
        $allowedMethodIds = PaymentMethodValidator::getAllowedPaymentMethods($deliveryMethod, $cityId);
        $allowedMethodsWithNames = PaymentMethodValidator::getAllowedPaymentMethodsWithNames($deliveryMethod, $cityId);

        return response()->json([
            'success' => true,
            'data' => [
                'allowed_payment_methods' => $allowedMethodIds,
                'payment_methods_with_names' => $allowedMethodsWithNames,
            ],
        ]);
    }
}
