<?php

namespace App\Http\Requests\Admin\Publisher;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublisherRequest extends FormRequest
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
            'name' => "required|unique:publishers,name,".$this->publisher->id,
            'slug' => "required|unique:publishers,slug,".$this->publisher->id
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống tên nhà xuất bản',
            'name.unique' => 'Nhà xuất bản đã tồn tại, vui lòng nhập tên khác',
            'slug.required' => 'Không được để trống slug',
            'slug.unique' => 'Slug đã tồn tại, vui lòng nhập slug khác',
        ];
    }
}
