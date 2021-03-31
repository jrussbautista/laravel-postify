<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {


       $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(auth()->attempt($credentials , $request->remember)) {
            $request->session()->regenerate();

            if(auth()->user()->is_admin) {
                return redirect()->intended('admin/dashboard');
            }else {
                return redirect()->intended('dashboard');
            }


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


    }
}
