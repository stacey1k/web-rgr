<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Показать форму входа
    public function showLogin($locale = null)
    {
        return view('auth.login');
    }

    // Обработать вход
    public function login(Request $request, $locale = null)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home', ['locale' => app()->getLocale()]));
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    // Показать форму регистрации
    public function showRegister($locale = null)
    {
        return view('auth.register');
    }

    // Обработать регистрацию
    public function register(Request $request, $locale = null)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => false,  // по умолчанию не админ
        ]);

        Auth::login($user);
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    }

    // Выход из системы
    public function logout(Request $request, $locale = null)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    }
}