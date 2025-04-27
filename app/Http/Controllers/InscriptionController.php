<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // important

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validation simple
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // email unique dans table users
            'password' => 'required|min:6',
        ]);

        // Stocker dans la BDD
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // toujours crypter le mot de passe
        $user->save();

        // Retour avec un message de succès
        return redirect()->back()->with('success', 'Compte créé avec succès !');
    }
}
