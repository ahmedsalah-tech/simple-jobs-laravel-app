<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister () {
        return view('auth.register');
    }

    public function showLogin () {
        return view('auth.login');
    }

     public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:64|confirmed' // hashed automatically in newer versions of Laravel
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('jobs.index');
    }

    public function login () {

    }

    public function logout (Request $request) {
        Auth::logout(); //logs out the current user and removes his data like session id

        $request->session()->invalidate(); // removes all data associated with teh session
        $request->session()->regenerateToken(); // recommened: regenerates the CSRF token for a new session

        return redirect()->route('show.login');
    }
}
