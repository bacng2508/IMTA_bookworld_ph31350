<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('client.profile.personal-infor');
    }

    public function myOrders()
    {
        return view('client.profile.my-order');
    }
}
