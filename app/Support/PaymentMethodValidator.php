<?php

namespace App\Support;

use App\Models\Area;
use App\Models\Order;

class PaymentMethodValidator
{
    /**
     * Get allowed payment methods based on delivery method and city.
     *
     * BUSINESS RULES:
     * 1. If delivery_method = "delivery":
     *    - If city_id = ALEXANDRIA_CITY_ID (Alexandria): allow COD (1), Online (2), and Visa on Delivery (3)
     *    - Otherwise: allow only Online/Visa (2)
     * 2. If delivery_method is NOT "delivery": allow ALL payment methods
     *
     * @param string|null $deliveryMethod
     * @param int|null $cityId
     * @return array
     */
    public static function getAllowedPaymentMethods(?string $deliveryMethod, ?int $cityId = null): array
    {
        // Rule 2: If delivery method is NOT "delivery" (e.g., pickup), allow all
        if ($deliveryMethod !== Order::DELIVERY_METHOD_DELIVERY) {
            return [
                Order::CASH_ON_DELIVERY,    // 1
                Order::ONLINE,              // 2
                Order::VISA_ON_DELIVERY,    // 3
            ];
        }

        // Rule 1: If delivery method IS "delivery"
        if ($deliveryMethod === Order::DELIVERY_METHOD_DELIVERY) {
            // Alexandria: allow COD, Online, and Visa on Delivery
            if ($cityId == Order::ALEXANDRIA_CITY_ID) {
                return [
                    Order::CASH_ON_DELIVERY,    // 1
                    Order::ONLINE,              // 2
                    Order::VISA_ON_DELIVERY,    // 3
                ];
            }
            
            // Other cities: allow only Online (Visa)
            return [
                Order::ONLINE,  // 2
            ];
        }

        // Default fallback
        return [
            Order::CASH_ON_DELIVERY,
            Order::ONLINE,
            Order::VISA_ON_DELIVERY,
        ];
    }

    /**
     * Get allowed payment methods by area ID.
     *
     * @param string|null $deliveryMethod
     * @param int|null $areaId
     * @return array
     */
    public static function getAllowedPaymentMethodsByArea(?string $deliveryMethod, ?int $areaId = null): array
    {
        $cityId = null;
        
        if ($areaId) {
            $area = Area::find($areaId);
            $cityId = $area ? $area->city_id : null;
        }
        
        return self::getAllowedPaymentMethods($deliveryMethod, $cityId);
    }

    /**
     * Check if a payment method is allowed.
     *
     * @param int $paymentMethodId
     * @param string|null $deliveryMethod
     * @param int|null $cityId
     * @return bool
     */
    public static function isPaymentMethodAllowed(int $paymentMethodId, ?string $deliveryMethod, ?int $cityId = null): bool
    {
        $allowedMethods = self::getAllowedPaymentMethods($deliveryMethod, $cityId);
        return in_array($paymentMethodId, $allowedMethods);
    }

    /**
     * Get allowed payment methods with their names.
     *
     * @param string|null $deliveryMethod
     * @param int|null $cityId
     * @return array
     */
    public static function getAllowedPaymentMethodsWithNames(?string $deliveryMethod, ?int $cityId = null): array
    {
        $allowedMethodIds = self::getAllowedPaymentMethods($deliveryMethod, $cityId);
        $allPaymentMethods = trans('orders.payment_methods');
        
        $result = [];
        foreach ($allowedMethodIds as $methodId) {
            if (isset($allPaymentMethods[$methodId])) {
                $result[$methodId] = $allPaymentMethods[$methodId];
            }
        }
        
        return $result;
    }
}

