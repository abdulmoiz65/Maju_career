<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Exception;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $nameParts  = explode(' ', $googleUser->getName(), 2);
            $firstName  = $nameParts[0] ?? '';
            $lastName   = $nameParts[1] ?? '';

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'username'   => Str::slug($googleUser->getName()) . '-' . Str::random(5),
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                    'password'   => bcrypt(Str::random(16)),
                    'google_id'  => $googleUser->getId(),
                    'email_verified_at'=> now(),
                ]
            );

            Auth::login($user);

            return redirect()->route('user.index')
                             ->with('success', 'Logged in with Google successfully!');
        } catch (Exception $e) {
    \Log::error('Google login error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
    return redirect()->route('login.form')
                     ->with('error', 'Google login failed: ' . $e->getMessage());
}

    }
}
