<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SupportMessage;


class AdminController extends Controller
{
    public function showLoginadminForm()
{
    return view('pageadmin');
}

    public function connexion(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin123@gmail.com' && $password === 'admin123') {
            return redirect()->route('pageadmin'); 
        } else {
            return redirect()->route('connexionadmin')->with('error', 'Email ou mot de passe incorrect');
        }
    }

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }
    public function submit(Request $request)
    {

        return redirect()->back()->with('success', 'Action réussie');
    }
    public function adminDashboard()
    {
        $users = User::all();
        $messages = SupportMessage::latest()->get();

        return view('pageadmin')->with([
            'users' => $users,
            'supports' => $supports
        ]);    }
}
