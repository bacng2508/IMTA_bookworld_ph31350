<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $totalMoney = 0;
        foreach ($cartItems as $item) {
            if ($item->book->price_sale != 0) {
                $totalMoney += $item->book->price_sale * $item->quantity;
            } else {
                $totalMoney += $item->book->price * $item->quantity;
            }
        }
        return view('client.cart', compact('cartItems', 'totalMoney'));
    }

    public function store(Request $request)
    {
        $isBookInCart = Cart::where('book_id', $request->id)->where('user_id', Auth::user()->id)->exists();
        if ($isBookInCart) {
            Cart::where('book_id', $request->id)->where('user_id', Auth::user()->id)->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'book_id' => $request->id,
                'quantity' => $request->quantity
            ]);
        }

        $cartQuantity = Cart::where('user_id', Auth::user()->id)->sum('quantity');

        return response()->json([
            'status' => 'success',
            'cartQuantity' => $cartQuantity,
        ]);
    }
}
