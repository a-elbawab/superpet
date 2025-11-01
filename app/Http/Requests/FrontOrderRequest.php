<?php

namespace App\Http\Requests;

use App\Rules\ValidPaymentMethod;
use Illuminate\Foundation\Http\FormRequest;

class FrontOrderRequest extends FormRequest
{
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
            'delivery_method' => 'required|string|in:' . implode(',', array_keys(trans('orders.delivery_methods'))),
            'delivery_price' => 'required_if:delivery_method,delivery|numeric',
            'name' => 'required|string|max:255',
            // بس تطلب الإيميل والعنوان لو التوصيل Delivery
            'email' => 'nullable|required_if:delivery_method,delivery|string|email|max:255',
            'address' => 'nullable|required_if:delivery_method,delivery|string|max:255',
            'phone' => 'required|string|max:255',
            'total' => 'required|numeric',
            'items' => 'required|json',
            'payment_method' => [
                'required',
                'string',
                'in:' . implode(',', array_keys(trans('orders.payment_methods'))),
                new ValidPaymentMethod($this->delivery_method, $this->area_id),
            ],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->delivery_method === 'pickup') {
            $this->merge([
                'area_id' => null,
            ]);
        } elseif ($this->delivery_method === 'delivery') {
            $this->merge([
                'branch_id' => null,
            ]);
        }
    }

}
