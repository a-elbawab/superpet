<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RecapRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            // 'presentation_title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            // 'abstract' => ['required', 'string'],
            'abstract_type' => ['required', 'string'],
            'abstract_theme' => ['required', 'string'],
            //PPT
            'file'  => ['required', 'mimes:pdf', 'max:2048'],
            'event_id' => 'required|numeric|exists:events,id',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('recaps.attributes');
    }
}
