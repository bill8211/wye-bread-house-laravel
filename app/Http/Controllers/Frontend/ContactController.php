<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Aseguramos que todo nuevo mensaje nazca como pendiente
        $validated['status'] = 'pendiente';

        ContactMessage::create($validated);

        return back()->with('success', '¡Gracias por escribirnos! Hemos recibido tu mensaje y te contactaremos pronto.');
    }
}