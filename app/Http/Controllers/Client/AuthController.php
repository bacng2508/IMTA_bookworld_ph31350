<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Client\Auth\ClientLoginRequest;
use App\Http\Requests\Client\Auth\ClientRegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.auth.login');
    }

    public function postLogin(ClientLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('/');
        }

        return back()->with('msg', 'Email hoặc mật khẩu không chính xác')
            ->withInput($request->except('password'));
    }

    public function register()
    {
        return view('client.auth.register');
    }

    public function postRegister(ClientRegisterRequest $request)
    {
        $data = $request->validated();
        $data['avatar'] = 'upload/user/avatar/default-avatar.png';
        User::create($data);
        return redirect()->route('login')->with('msg', 'Tài khoản đã được đăng ký thành công');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
