<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
       $request->validate([
        'username' => 'required|string|max:255|unique:users',
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'username'  => $request->username,
        'first_name'=> $request->first_name,
        'last_name' => $request->last_name,
        'email'     => $request->email,
        'password'  => Hash::make($request->password),
    ]);
    // Optionally log in immediately
    Auth::login($user);
    $user->sendEmailVerificationNotification();

    return redirect()->route('verification.notice')->with('success', 'We sent a verification link to your email. Please verify before applying.');
    }

public function showLogin()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    // Find the user first
    $user = User::where('email', $request->email)->first();

    if (! $user) {
        return back()->withErrors([
            'email' => 'We can’t find an account with that email address.',
        ])->onlyInput('email');
    }

    if (! Hash::check($request->password, $user->password)) {
      
        return back()->withErrors([
            'password' => 'The password you entered is incorrect.',
        ])->onlyInput('email'); 
    }

    if (Auth::attempt($request->only('email','password'), $request->boolean('remember'))) {
        $request->session()->regenerate();

        // Email verification check
        if (is_null($user->google_id) && ! $user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('verification.notice')
                ->with('error', 'You must verify your email before logging in.');
        }

        return redirect()->intended(route('user.index'))
                         ->with('success', 'Welcome back, '.$user->first_name.'!');
    }

    // Fallback (should rarely hit)
    return back()->withErrors([
        'email' => 'Login failed. Please try again.',
    ]);
}


public function logout(Request $request)
{
    try {
        Auth::logout();
    } catch (\Exception $e) {
        // already logged out or session missing
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form')->with('success', 'You have been logged out.');
}


protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        // Flash message before redirect
        session()->flash('error', 'Please login to apply for this job.');
        return route('login.form');
    }
}



}
