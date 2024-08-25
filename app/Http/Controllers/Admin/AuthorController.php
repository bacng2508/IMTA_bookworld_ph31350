<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\StoreAuthorRequest;
use App\Http\Requests\Admin\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::latest()->paginate(10);
        return view('admin.authors.index', compact('authors'));
    }

    public function create() {
        return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request) {
        Author::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return redirect()->route('admin.authors.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Thêm tác giả thành công');
    }

    public function edit(Author $author) {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Author $author, UpdateAuthorRequest $request) {
        $author->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return back()
            ->with('msg_type', 'success')
            ->with('msg', 'Cập nhật tác giả thành công');
    }

    public function destroy(Author $author) {
        $author->delete();
        return redirect()->route('admin.categories.index')
                        ->with('msg_type', 'success')
                        ->with('msg', 'Xóa danh mục thành công');
    }
}
