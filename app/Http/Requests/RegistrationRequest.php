<?php

namespace App\Http\Requests;

use App\Models\Guest;
use App\Rules\StudentReciptValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        //delete payment_method == online where created_at 10 minutes ago and not paid
        //        Guest::where('paid', false)->where('payment_method', 'online')->delete();

        $validations = [
            'title' => 'required|string|max:255|min:1',
            'first_name' => 'required|string|max:255|min:1',
            'city' => 'nullable|string|max:255|min:1',
            'last_name' => 'required|string|max:255|min:1',
            'email' => 'required|string|max:255|registered:event_id,' . request('event')?->id,
            'registration_id' => 'required|exists:registrations,id',
            'phone' => 'required|string|max:16|min:9',
            'affiliation' => 'required|string|max:255',
            'currency' => 'nullable|in:EGP,USD',
            'payment_method' => ['required', 'in:online,recipt', new StudentReciptValidation()],
            'price' => 'nullable|numeric',
            'days' => 'nullable|integer',
        ];

        $validations['recipt'] = 'required_if:payment_method,==,recipt|mimes:jpg,jpeg,bmp,png,gif,svg,pdf';

        if (request('event')?->id == 47) {
            $validations['id'] = 'required_if:payment_method,==,recipt|mimes:jpg,jpeg,bmp,png,gif,svg,pdf';
        }

        return $validations;
    }


    public function messages()
    {
        return [
            'email.registered' => 'This Mail Already Registered',
        ];
    }
}
