<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'last_name' => 'nullable|string|max:255|min:1',
            'city' => 'nullable|string|max:255|min:1',
            'registration_id' => 'required|exists:registrations,id',
            'phone' => 'nullable|string|max:225',
            'affiliation' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
        ];

        if (request()->method() == 'POST') {
            $validations['email'] = 'required|string|max:255|registered:event_id,' . request('event');
        } elseif (request()->method() == 'PUT') {
            $validations['email'] = 'required|string|max:255';
        }

        return $validations;
    }


    public function messages()
    {
        $messages = request('registration_id') == 11 ? "Please Upload Your ID" : "Please Upload Your Certificate";
        return [
            'email.registered' => 'This Mail Already Registered',
            'id_or_certificate' => $messages,
        ];
    }
}
