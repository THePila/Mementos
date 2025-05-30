<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ],
            [
                'email.required' => 'The email is required.',
                'email.email' => 'The email is not a email.',
                'email.exists' => 'The email is not exist.',
                'password.required' => 'The password is required.',
            ]
        );

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'password' => 'La contraseña es incorrecta.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
        ], [
            'email.required' => 'The email is required.',
            'email.email' => 'The email is not a valid email address.',
            'email.exists' => 'The email does not exist in our records.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->oldPassword, $user->password)) {
            return response()->json([
                'errors' => ['oldPassword' => ['The current password is incorrect.']]
            ], 422);
        }

        $user->password = bcrypt($request->newPassword);
        $user->save();
        return response()->json(['success' => 'Password updated successfully.']);
    }
}
