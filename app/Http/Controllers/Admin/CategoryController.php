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
        $categories = Category::latest()->paginate(10);
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
        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return back()
            ->with('msg_type', 'success')
            ->with('msg', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')
                        ->with('msg_type', 'success')
                        ->with('msg', 'Xóa danh mục thành công');
    }
}
