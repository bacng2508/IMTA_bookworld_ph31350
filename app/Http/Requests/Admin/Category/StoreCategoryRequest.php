<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống tên danh mục',
            'name.unique' => 'Danh mục đã tồn tại, vui lòng nhập tên khác',
            'slug.required' => 'Không được để trống slug',
            'name.unique' => 'Slug đã tồn tại, vui lòng nhập slug khác',
        ];
    }
}
