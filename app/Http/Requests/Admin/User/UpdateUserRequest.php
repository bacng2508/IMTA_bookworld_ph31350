<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên',
            'password.required' => 'Không được để trống mật khẩu',
            'password.min' => 'Độ dài tối thiểu của mật khẩu phải là 8 ký tự',
            'password_confirmation.required' => 'Không được để trống nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp',
        ];
    }
}
