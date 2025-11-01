<?php

namespace App\Rules;

use App\Models\Area;
use App\Models\Order;
use Illuminate\Contracts\Validation\Rule;

class ValidPaymentMethod implements Rule
{
    protected $deliveryMethod;
    protected $areaId;
    protected $cityId;

    /**
     * Create a new rule instance.
     *
     * @param string|null $deliveryMethod
     * @param int|null $areaId
     */
    public function __construct(?string $deliveryMethod, ?int $areaId)
    {
        $this->deliveryMethod = $deliveryMethod;
        $this->areaId = $areaId;
        
        // Get city_id from area_id if provided
        if ($this->areaId) {
            $area = Area::find($this->areaId);
            $this->cityId = $area ? $area->city_id : null;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowedMethods = $this->getAllowedPaymentMethods();
        return in_array((int) $value, $allowedMethods);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $allowedMethodNames = [];
        $paymentMethods = trans('orders.payment_methods');
        
        foreach ($this->getAllowedPaymentMethods() as $methodId) {
            if (isset($paymentMethods[$methodId])) {
                $allowedMethodNames[] = $paymentMethods[$methodId];
            }
        }
        
        return __('The selected payment method is not available. Allowed methods: :methods', [
            'methods' => implode(', ', $allowedMethodNames)
        ]);
    }

    /**
     * Get allowed payment methods based on business rules.
     *
     * BUSINESS RULES:
     * 1. If delivery_method = "delivery":
     *    - If city_id = ALEXANDRIA_CITY_ID (Alexandria): allow COD (1), Online (2), and Visa on Delivery (3)
     *    - Otherwise: allow only Online/Visa (2)
     * 2. If delivery_method is NOT "delivery": allow ALL payment methods
     *
     * @return array
     */
    protected function getAllowedPaymentMethods(): array
    {
        // Rule 2: If delivery method is NOT "delivery" (e.g., pickup), allow all payment methods
        if ($this->deliveryMethod !== Order::DELIVERY_METHOD_DELIVERY) {
            return [
                Order::CASH_ON_DELIVERY,    // 1
                Order::ONLINE,              // 2
                Order::VISA_ON_DELIVERY,    // 3
            ];
        }

        // Rule 1: If delivery method IS "delivery"
        if ($this->deliveryMethod === Order::DELIVERY_METHOD_DELIVERY) {
            // Alexandria: allow COD, Online, and Visa on Delivery
            if ($this->cityId == Order::ALEXANDRIA_CITY_ID) {
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

        // Default fallback: allow all
        return [
            Order::CASH_ON_DELIVERY,
            Order::ONLINE,
            Order::VISA_ON_DELIVERY,
        ];
    }
}

