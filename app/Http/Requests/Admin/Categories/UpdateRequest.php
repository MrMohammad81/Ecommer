<?php

namespace App\Http\Requests\Admin\Categories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'name' => 'required|min:2',
            'slug' => 'required|min:2',
            'parent_id' => 'required',
            'is_active' => 'required',
            'attribute_ids' => 'required',
            'attribute_is_filter_ids' => 'required',
            'variation_id' => 'required',
        ];
    }
}
