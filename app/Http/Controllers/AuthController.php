<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('login');
        }

        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => 'required',
        ]);

        // Find the user by name (assuming 'name' is unique)
        $user = User::where('name', $credentials['name'])->first();

        if ($user && $user->password === $credentials['password']) {
            // Manually log in the user
            Auth::login($user);

            // Redirect to the intended page after successful login
            return redirect()
                ->route('home')
                ->with('success', "Successfully Logged In!");
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('logout' . "You are logged out.");
    }
}
