<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required',
        ],
            [
                'email.required'    => 'The email is required.',
                'email.email'       => 'The email is not a email.',
                'email.exists'      => 'The email is not exist.',
                'password.required' => 'The password is required.',
            ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'password' => 'La contraseña es incorrecta.',
        ]);
    }
}
