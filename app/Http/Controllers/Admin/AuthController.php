<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('pages.admin.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi manual dengan Laravel Validator
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Jika validasi gagal (email/password kosong atau format salah)
        if ($validator->fails()) {
            return back()->withErrors([
                'auth' => 'Credentials do not match our records.'
            ])->onlyInput('email');
        }

        // Jika login gagal
        if (!Auth::attempt($validator->validated())) {
            return back()->withErrors([
                'auth' => 'Credentials do not match our records.'
            ])->onlyInput('email');
        }

        // Login berhasil
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }

    // public function registerIndex()
    // {
    //     return view('pages.admin.auth.register');
    // }

    // public function registerStore(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return redirect()->route('admin.login.index')->with('success', 'Created an account successfuly. Please login to continued');
    // }
}
