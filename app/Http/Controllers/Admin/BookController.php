<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreBookRequest;
use App\Http\Requests\Admin\Book\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create() {
        // return view('admin.publishers.create');
    }

    public function store(StoreBookRequest $request) {
        // Publisher::create([
        //     'name' => $request->input('name'),
        //     'slug' => $request->input('slug')
        // ]);

        // return redirect()->route('admin.publishers.index')
            // ->with('msg_type', 'success')
            // ->with('msg', 'Thêm nhà xuất bản thành công');
    }

    public function edit(Book $book) {
        // return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(Book $book, UpdateBookRequest $request) {
        // $publisher->update([
        //     'name' => $request->input('name'),
        //     'slug' => $request->input('slug')
        // ]);

        // return back()
            // ->with('msg_type', 'success')
            // ->with('msg', 'Cập nhật nhà xuất bản thành công');
    }

    public function destroy(Book $book) {
        // $publisher->delete();
        // return redirect()->route('admin.publishers.index')
        //                 ->with('msg_type', 'success')
        //                 ->with('msg', 'Xóa danh mục thành công');
    }
}
