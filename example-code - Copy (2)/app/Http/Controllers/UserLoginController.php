<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('web.login');
    }

    public function login_submit(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);
        // Fetch user from database
        $user = DB::table('users')->where('email', $request->email)->first();

        // Check if user exists and password matches (without hashing)
        if ($user && $user->password === $request->password) {
            // Log in the user manually
            Auth::loginUsingId($user->id); // Logs in the user by ID
            Session::put('user_id_get', $user->id);
            return redirect()->route('index');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
}

    public function logout_user()
    {
        Session::flush();
        return redirect()->route('index');
    }
}
