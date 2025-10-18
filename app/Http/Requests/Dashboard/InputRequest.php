<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Input;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
        // Get the maximum allowed order
        $maxOrder = Input::where('section_id', request()->section_id)->max('order') + 1;

        return RuleFactory::make([
            '%label%' => ['required', 'string', 'max:255'],
            'section_id' => ['required', 'exists:sections,id'],
            'type' => ['required', 'string', 'max:255'],
            'required' => ['required', 'boolean'],
            'order' => 'nullable|integer|max:"' . $maxOrder . '"',
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('inputs.attributes');
    }
}
