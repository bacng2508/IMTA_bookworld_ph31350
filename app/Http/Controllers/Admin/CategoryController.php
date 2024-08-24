<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request) {
        Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return redirect()->route('admin.categories.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Thêm danh mục thành công');
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, UpdateCategoryRequest $request) {
        // $request->validate(
        //     [
        //         'name' => "required|unique:categories,name,$category->id",
        //         'slug' => "required|unique:categories,slug,$category->id"
        //     ],
        //     [
        //         'name.required' => 'Không được để trống tên danh mục',
        //         'name.unique' => 'Danh mục đã tồn tại, vui lòng nhập tên khác',
        //         'slug.required' => 'Không được để trống slug',
        //         'slug.unique' => 'Slug đã tồn tại, vui lòng nhập tên khác'
        //     ]
        // );

        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return back()->with('msg', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('msg', 'Xóa danh mục thành công');
    }
}
