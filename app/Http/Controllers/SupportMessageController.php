<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage; 
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function showMessages()
    {
        $messages = SupportMessage::orderBy('created_at', 'desc')->get();
        return view('messages', compact('messages'));
    }
}
