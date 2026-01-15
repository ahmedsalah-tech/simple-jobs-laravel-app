<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

    public function login (Request $request) {
        // Validate method returns Check exception in which we can send to teh view
        // by throwing the ValidationException Exception
         $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string' // hashed automatically in newer versions of Laravel
        ]);

        if (Auth::attempt($validated)) { // attempt method returns boolean and assigns a token to the validated user
            $request->session()->regenerate(); // recommended since it prevents Fixation attacks

            return redirect()->route('jobs.index');
        }

        throw ValidationException::withMessages([
            'Credentials' => 'Sorry, Incorrect credentails'
        ]);
    }

    public function logout (Request $request) {
        Auth::logout(); //logs out the current user and removes his data like session id

        $request->session()->invalidate(); // removes all data associated with teh session
        $request->session()->regenerateToken(); // recommened: regenerates the CSRF token for a new session

        return redirect()->route('show.login');
    }
}
