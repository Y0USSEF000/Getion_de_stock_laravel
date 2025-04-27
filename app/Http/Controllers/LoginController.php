<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')
                ->where('email', $email)
                ->first();

        if ($user && Hash::check($password, $user->password)) {
            return redirect()->route('page1');
        } else {
            return back()->with('error', 'Email or password is incorrect');
        }
    }
}