<?php

namespace App\Http\Requests\Admin\Book;

use Closure;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => 'required|unique:books,name',
            'slug' => 'required|unique:books,slug',
            'cover_image' => 'required|image|max:2048',
            'description' => 'required',
            'price' => 'required|integer',
            'price_sale' => ['nullable', function (string $attribute, mixed $value, Closure $fail) {
                if ($this->route('price_sale') < $this->route('price')) {
                    $fail("Giá sale không được lớn hơn giá gôc");
                }
            }],
            'stock' => 'required|integer|min:1',
            'author_id' => ['required', 'exists:authors,id'],
            'publisher_id' => ['required', 'exists:publishers,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'stock' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống tên sách',
            'name.unique' => 'Tên sách đã tồn tại, vui lòng nhập tên khác',
            'slug.required' => 'Không được để trống slug',
            'slug.unique' => 'Slug đã tồn tại, vui lòng nhập slug khác',
            'cover_image.required' => 'Không được để trống ảnh bìa',
            'cover_image.image' => 'File không đúng định dạng ảnh',
            'cover_image.max' => 'Dung lượng của ảnh không được vượt quá 2MB',
            'description' => 'Không được bỏ trống mô tả sách',
            'price.required' => 'Phải nhập giá',
            'price.integer' => 'Giá phải là số',
            'stock.required' => 'Không được để trống số lượng sách',
            'author_id.required' => 'Phải lựa chọn tác giả',
            'author_id.exists' => 'Tác giả không hợp lệ',
            'publisher_id.required' => 'Phải lựa chọn nhà xuất bản',
            'publisher_id.exists' => 'Nhà xuất bản không hợp lệ',
            'category_id.required' => 'Phải lựa chọn danh mục',
            'category_id.exists' => 'Danh mục đã tồn tại',
            'stock.required' => 'Phải nhập số lượng sách',
            'stock.integer' => 'Số lượng sách không hợp lệ',
            'stock.min' => 'Số lượng tối thiểu phải là 1'
        ];
    }
}
