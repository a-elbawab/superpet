<?php

namespace App\Helpers;

use App\Models\Area;
use App\Models\City;
use App\Models\Order;

class CheckoutHelper
{
    /**
     * Resolve the city_id for checkout validation based on priority:
     * 1. Selected area's city_id
     * 2. Authenticated user's city_id
     * 3. null (must select area)
     *
     * @param int|null $areaId
     * @return int|null
     */
    public static function resolveCheckoutCityId(?int $areaId): ?int
    {
        // Priority 1: If area is selected, use area's city_id
        if ($areaId) {
            $area = Area::find($areaId);
            if ($area) {
                return $area->city_id;
            }
        }

        // Priority 2: If user is authenticated and has a city_id, use it
        if (auth()->check() && auth()->user()->city_id) {
            return auth()->user()->city_id;
        }

        // Priority 3: No city resolved
        return null;
    }

    /**
     * Get allowed payment methods based on delivery method and city
     *
     * @param string $deliveryMethod
     * @param int|null $cityId
     * @return array
     */
    public static function getAllowedPaymentMethods(string $deliveryMethod, ?int $cityId): array
    {
        // If delivery method is NOT "delivery", allow all payment methods
        if ($deliveryMethod !== 'delivery') {
            return [Order::CASH_ON_DELIVERY, Order::ONLINE, Order::VISA_ON_DELIVERY]; // All payment methods: COD, Online, Visa on Delivery
        }

        // For delivery method = "delivery"
        if ($cityId === City::ALEXANDRIA_CITY_ID) {
            // Alexandria: allow COD (1), Online (2), and Visa on Delivery (3)
            return [Order::CASH_ON_DELIVERY, Order::ONLINE, Order::VISA_ON_DELIVERY];
        }

        // Other cities: allow only Online (2)
        return [Order::ONLINE];
    }

    /**
     * Check if a payment method is allowed
     *
     * @param int $paymentMethod
     * @param string $deliveryMethod
     * @param int|null $cityId
     * @return bool
     */
    public static function isPaymentMethodAllowed(int $paymentMethod, string $deliveryMethod, ?int $cityId): bool
    {
        $allowedMethods = self::getAllowedPaymentMethods($deliveryMethod, $cityId);
        return in_array($paymentMethod, $allowedMethods);
    }
}
