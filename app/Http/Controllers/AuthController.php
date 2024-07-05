<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'full_name' => 'required',
            'user_name' => 'required|unique:users,user_name',
            'password' => 'required',
        ]);

        User::create([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Anda berhasil mendaftarkan akun silahkan login!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);

        if (Auth::attempt($user)) {
            return redirect()->route('instagram.index')->with('success', 'Anda berhasil login.');
        } else {
            return redirect()->back()->with('failed', 'Email/Password salah, silahkan masukkan lagi!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
