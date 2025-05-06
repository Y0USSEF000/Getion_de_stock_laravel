<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Support::create($validated);

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
    public function index()
    {
        return view('stockshopmaster');
    }
}