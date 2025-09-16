<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            User::NAME => 'required|string|max:255',
            User::EMAIL => 'required|email|unique:' . User::TABLENAME . ',' . User::EMAIL,
            User::PASSWORD => 'required|string|min:5|confirmed', // requires password_confirmation
        ]);

        // Create user using constants and hash password
        $user = User::create([
            User::NAME => $validated[User::NAME],
            User::EMAIL => $validated[User::EMAIL],
            User::PASSWORD => bcrypt($validated[User::PASSWORD]),
        ]);

        return redirect('/')->with('success', 'Account registered successfully!');
    }
}
