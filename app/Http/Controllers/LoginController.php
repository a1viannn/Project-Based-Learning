<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    // public function postlogin(Request $request)
    // {
    //     $request->validate([
    //         'email'     => 'required',
    //         'password'  => 'required',
    //     ]);

    //     $data = [
    //         'email'     => $request->email,
    //         'password'  => $request->password,
    //     ];

    //     if(Auth::attempt($data)) {
    //         return redirect()->route('dashboard')->with('succes', 'Kamu Berhasil Login');
    //     } else {
    //         return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    //     }
    // }


    public function postlogin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email'     => 'required|email',
        'password'  => 'required',
        'g-recaptcha-response' => 'required|recaptcha',
    ]);

    if ($validator->fails()) {
        return redirect()->route('login')
                         ->withErrors($validator)
                         ->withInput()
                         ->with('captcha_failed', 'mohon konfirmasi bahwa anda bukan robot.');
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard')->with('succes', 'Kamu Berhasil Login');
    } else {
        return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('succes', 'Kamu Berhasil Logout');
    }
}
