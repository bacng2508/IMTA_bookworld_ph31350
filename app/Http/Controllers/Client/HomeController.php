<?php

namespace App\Http\Controllers\Client;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('client.home', compact('books'));
    }

    public function show(Book $book)
    {
        return view('client.book-detail', compact('book'));
    }
}
