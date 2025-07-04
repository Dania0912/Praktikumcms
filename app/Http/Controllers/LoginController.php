<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        Log::info('Form login dibuka.');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            $credentials = [
                'email' => strtolower($request->email),
                'password' => $request->password,
            ];

            if (Auth::guard('hr')->attempt($credentials)) {
                Log::info('Login berhasil oleh HR: ' . auth()->guard('hr')->user()->name);
                return redirect()->intended(route('home'))->with('success', 'Login berhasil.');
            }

            Log::warning('Login gagal dengan email: ' . $request->email);
            return back()->withErrors(['email' => 'Email atau password salah.']);
        } catch (Throwable $e) {
            Log::error('Error saat login: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Terjadi kesalahan saat proses login.']);
        }
    }

    public function logout()
    {
        try {
            $user = auth()->guard('hr')->user();
            Auth::guard('hr')->logout();
            Log::info('Logout berhasil oleh HR: ' . optional($user)->name);
            return redirect('/login')->with('success', 'Anda berhasil logout.');
        } catch (Throwable $e) {
            Log::error('Error saat logout: ' . $e->getMessage());
            return redirect('/login')->withErrors('Terjadi kesalahan saat logout.');
        }
    }
}
