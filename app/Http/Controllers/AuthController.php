<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //dd(Auth::attempt($credentials));
        //dd(Hash::make('1qazxsw2'));

        if (Auth::attempt($credentials)) {
            return redirect()->intended('inicio');
        }
        return redirect()->back()->withErrors(['correo' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}