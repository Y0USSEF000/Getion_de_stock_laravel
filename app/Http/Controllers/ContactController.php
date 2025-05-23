<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\SupportMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Log the incoming request data
        \Log::info('Contact form submission:', $request->all());

        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Store the message in the database
            $message = SupportMessage::create($validated);
            
            // Log the created message
            \Log::info('Support message created:', ['id' => $message->id]);
            
            return back()->with('success', 'Message envoyé avec succès !');
        } catch (\Exception $e) {
            // Log any errors
            \Log::error('Error saving support message:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer plus tard.')
                         ->withInput();
        }
    }
}
