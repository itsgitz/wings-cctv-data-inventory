<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function login()
    {
        return view('auth.login', []);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'         => ['required', 'email'],
                'password'      => ['required']
            ],
        );

        if ( Auth::attempt($credentials) ) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email'         => 'Alamat email yang anda masukan salah atau tidak terdaftar',
            'password'      => 'Password yang anda masukan salah'
        ]);
    }

    public function register()
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
