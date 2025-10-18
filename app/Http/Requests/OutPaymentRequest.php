<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutPaymentRequest extends FormRequest
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
        $validations = [
            'first_name' => 'required|string|max:255|min:1',
            'last_name' => 'required|string|max:255|min:1',
            'email' => 'required|string|max:255',
            'registration_id' => 'required|string|max:255',
            'phone' => 'required|string|max:225',
            'affiliation' => 'required|string|max:255',
            'currency' => 'nullable|in:EGP,USD',
            'serial' => 'required|string',
            'guest_id' => 'required|numeric',
            'event_id' => 'required|string',
            'event' => 'required|string',
            'project' => 'required|in:asnsc',
        ];

        return $validations;
    }


    public function messages()
    {
        return [
            'email.registered' => 'This Mail Already Registered',
        ];
    }
}
