<?php

namespace App\Http\Requests\Dashboard;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return RuleFactory::make([
            '%name%' => ['required', 'string', 'max:255'],
            '%description%' => ['required', 'string'],
            'parent' => 'required|in:1,0',
            'code' => 'nullable|string',
            'price' => 'required_if:parent,==,0|numeric|nullable',
            'old_price' => 'numeric|nullable',
            'stock' => 'required_if:parent,==,0|integer|nullable',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:categories,id',
            'active' => 'required|in:1,0',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:users,id',
            'combinations' => 'nullable|array',
            'combinations.*.value_ids' => 'required|array|min:1',
            'combinations.*.value_ids.*' => 'required|exists:variations,id',
            'combinations.*.price' => 'nullable|numeric|min:0',
            'combinations.*.stock' => 'nullable|numeric|min:0',
            'combinations.*.image' => 'nullable|file|mimes:jpeg,jpg,png,webp',
            '%meta_description%' => ['nullable', 'string', 'max:500'],
            '%meta_keywords%' => ['nullable', 'string', 'max:500'],
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('products.attributes');
    }

    //prepare for validation
    public function prepareForValidation()
    {
        $this->merge([
            'price' => $this->request->get('price') ?? 0,
            'stock' => $this->request->get('stock') ?? 0,
        ]);
    }
}
