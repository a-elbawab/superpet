<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'phone' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'presentation_title' => ['required', 'string', 'max:255'],
            'abstract_background' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'file' => 'required|mimes:pdf,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:10048'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('feedback.attributes');
    }
}
