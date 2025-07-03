<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        /* Forces Auth::user() to always use 'admin' when
       these controllers are called. */
        Auth::shouldUse('admin');
    }
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {        
        return view('login');
    }
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function login(Request $request)
    {        
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
