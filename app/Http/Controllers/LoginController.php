<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Successfully logged');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
