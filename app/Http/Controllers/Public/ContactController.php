<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sender_name' => [
                'required',
                'string',
                'max:150',
            ],
            'sender_email' => [
                'required',
                'email',
                'max:255',
            ],
            'subject' => [
                'required',
                'string',
                'max:150',
            ],
            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
        ]);

        ContactMessage::create([
            'user_id' => $request->user()?->getAuthIdentifier(),
            'sender_name' => $validated['sender_name'],
            'sender_email' => $validated['sender_email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'pendiente',
        ]);

        return redirect()
            ->route('home')
            ->withFragment('contacto')
            ->with('contact_success', 'Tu mensaje se envió correctamente. ¡Gracias por contactarnos!');
    }
}