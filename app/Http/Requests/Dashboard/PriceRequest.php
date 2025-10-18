<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'currency' => ['required', 'in:EGP,USD'],
            'registration_id' => ['required', 'exists:registrations,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('prices.attributes');
    }
}
