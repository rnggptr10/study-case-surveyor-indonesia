<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        Session::put('user', $user);

        return $user->role === 'admin' ? redirect('/admin/dashboard') : redirect('/user/dashboard');
    }

    public function logout() {
        Session::forget('user');
        return redirect('/login');
    }
}
