<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login form
     * @return View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Logout user
     * @return View
     */
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Authenticate user by credentials
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('products');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
