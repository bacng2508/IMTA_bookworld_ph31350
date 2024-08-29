<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên',
            'email.required' => 'Không được bỏ trống email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng, vui lòng nhập email khác',
            'password.required' => 'Không được để trống mật khẩu',
            'password.min' => 'Độ dài tối thiểu của mật khẩu phải là 8 ký tự',
            'password_confirmation.required' => 'Không được để trống nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp',
        ];
    }
}
