<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Book\StoreBookRequest;
use App\Http\Requests\Admin\Book\UpdateBookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('admin.books.create', compact('authors', 'publishers', 'categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('upload/book/cover-image', 'public');
        }

        $data['cover_image'] = $coverImagePath;

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Thêm nhà sách thành công');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'authors', 'publishers', 'categories'));
    }

    public function update(Book $book, UpdateBookRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image != 'upload/book/cover-image/default-cover-image.jpg') {
                Storage::disk('public')->delete($book->cover_image);
            }
            $coverImagePath = $request->file('cover_image')->store('upload/book/cover-image', 'public');
            $data['cover_image'] = $coverImagePath;
        }

        $book->update($data);

        return back()
            ->with('msg_type', 'success')
            ->with('msg', 'Cập nhật sách thành công');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_image != 'upload/book/cover-image/default-cover-image.jpg') {
            Storage::disk('public')->delete($book->cover_image);
        }
        $book->delete();
        return redirect()->route('admin.books.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Xóa danh mục thành công');
    }
}
