<?php

namespace App\Http\Requests;

use App\Helpers\CheckoutHelper;
use Illuminate\Foundation\Http\FormRequest;

class FrontOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * This method is created to handle authorization for front-end order requests.
     * It returns true to allow all users (both authenticated and guest users) 
     * to submit orders through the frontend checkout process.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'branch_id' => 'nullable|required_if:delivery_method,pickup|exists:branches,id',
            'area_id' => 'nullable|required_if:delivery_method,delivery|exists:areas,id',
            'city_id' => 'nullable|required_if:delivery_method,delivery|exists:cities,id',
            'delivery_method' => 'required|string|in:' . implode(',', array_keys(trans('orders.delivery_methods'))),
            'delivery_price' => 'required_if:delivery_method,delivery|numeric',
            'name' => 'required|string|max:255',
            'email' => 'nullable|required_if:delivery_method,delivery|string|email|max:255',
            'address' => 'nullable|required_if:delivery_method,delivery|string|max:255',
            'phone' => 'required|string|max:255',
            'total' => 'required|numeric',
            'items' => 'required|json',
            'payment_method' => [
                'required',
                'integer',
                'in:' . implode(',', array_keys(trans('orders.payment_methods'))),
                function ($attribute, $value, $fail) {
                    $this->validatePaymentMethod($value, $fail);
                }
            ],
        ];
    }

    /**
     * Custom payment method validation based on business rules
     *
     * @param int $paymentMethod
     * @param \Closure $fail
     * @return void
     */
    protected function validatePaymentMethod(int $paymentMethod, \Closure $fail): void
    {
        $deliveryMethod = $this->input('delivery_method');
        $areaId = $this->input('area_id');

        // Resolve city_id based on priority
        // Priority 1: Use city_id from form if available
        // Priority 2: Resolve from area_id
        $cityId = $this->input('city_id') ?? CheckoutHelper::resolveCheckoutCityId($areaId);

        // For delivery method, city must be resolved
        if ($deliveryMethod === 'delivery' && !$cityId) {
            $fail(__('orders.validation.city_required_for_delivery'));
            return;
        }

        // Check if payment method is allowed
        if (!CheckoutHelper::isPaymentMethodAllowed($paymentMethod, $deliveryMethod, $cityId)) {
            // Log suspicious activity
            \Log::warning('Invalid payment method attempted', [
                'user_id' => auth()->id(),
                'ip' => request()->ip(),
                'payment_method' => $paymentMethod,
                'delivery_method' => $deliveryMethod,
                'city_id' => $cityId,
            ]);

            $allowedMethods = CheckoutHelper::getAllowedPaymentMethods($deliveryMethod, $cityId);
            $allowedMethodsText = implode(', ', array_map(function ($method) {
                return trans('orders.payment_methods.' . $method);
            }, $allowedMethods));

            $fail(__('orders.validation.payment_method_not_allowed', [
                'allowed_methods' => $allowedMethodsText
            ]));
        }
    }

    /**
     * Prepare data for validation
     */
    protected function prepareForValidation()
    {
        if ($this->delivery_method === 'pickup') {
            $this->merge([
                'area_id' => null,
                'city_id' => null,
            ]);
        } elseif ($this->delivery_method === 'delivery') {
            $this->merge([
                'branch_id' => null,
            ]);
        }
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => __('orders.attributes.name'),
            'email' => __('orders.attributes.email'),
            'phone' => __('orders.attributes.phone'),
            'address' => __('orders.attributes.address'),
            'delivery_method' => __('orders.attributes.delivery_method'),
            'area_id' => __('orders.attributes.area_id'),
            'city_id' => __('orders.attributes.city_id'),
            'branch_id' => __('orders.attributes.branch_id'),
            'payment_method' => __('orders.attributes.payment_method'),
            'items' => __('orders.attributes.items'),
            'total' => __('orders.attributes.total'),
        ];
    }
}
