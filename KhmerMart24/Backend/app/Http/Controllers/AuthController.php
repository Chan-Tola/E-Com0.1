<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(User::EMAIL, User::PASSWORD);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->back()->with('success', 'Login Success');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            User::USERNAME => 'required|string|max:255',
            User::EMAIL => 'required|email|unique:' . User::TABLENAME . ',' . User::EMAIL,
            User::PASSWORD => 'required|string|min:5|confirmed', // requires password_confirmation
        ]);

        // Create user using constants and hash password
        $user = User::create([
            User::USERNAME => $validated[User::USERNAME],
            User::EMAIL => $validated[User::EMAIL],
            User::PASSWORD => bcrypt($validated[User::PASSWORD]),
        ]);

        Auth::login($user);
        return redirect()->back()->with('success', 'Account registered successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success', 'Account registered successfully!');
    }
}
