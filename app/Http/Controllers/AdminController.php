<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginadminForm()
    {
        return view('pageadmin');
    }
    public function submit(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('pageadmin'); 
        }
    
        return back()->with('error', 'Email ou mot de passe incorrect.');
    }
}
