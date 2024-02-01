<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * We can use the Auth Scaffolding from Laravel UI to create the user login and password reset routine.
     * I choose create my own method to avoid use Laravel UI Lib.
     */
    public function authenticate(Request $request)
    {
        // Get the email and password
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        // Find a user with this e-mail
        $user = User::where('email', $email)->first();
        // Check password
        if ($user) {
            // Check password
            if (Hash::check($password, $user->getAttribute('password'))) {
                // Success!
                Auth::login($user);
                // Return with message
                return redirect()->back()->with(['generalSuccess' => 'Login successfully']);
            }
        }

        // Return default error
        return redirect()->back()->with(['authError' => 'Email or Password are incorrect']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Default login route (fall back for Auth middleware
     * Send to home and ask for login
     */
    public function login(Request $request){
        // Force user to login
        return redirect()->route('contact.index')->with(['authError' => 'You have to be logged in for this action']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Just Logout the user
        Auth::logout();

        // Return with message
        return redirect()->back()->with(['generalWarning' => 'You are no longer logged in']);

    }
}
