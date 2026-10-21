<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('admin.login');
    }

    // Memproses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('admin.register');
    }

    // Memproses register
    public function registerStore(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins,username',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        Admin::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}