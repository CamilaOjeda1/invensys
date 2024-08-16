<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
 
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

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

    public function recupera_contrasena(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['correo' => 'El correo no existe en nuestros registros.']);
        }
        return redirect()->back()->with('status', 'Se ha enviado un enlace a su correo electrónico');
    }
}