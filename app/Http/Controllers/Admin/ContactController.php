<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        // Ordenamos para ver primero los 'pendientes' y luego los más recientes
        $messages = ContactMessage::orderByRaw("status = 'pendiente' DESC")
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(15);

        return view('admin.contacts.index', compact('messages'));
    }

    public function markAsAttended(ContactMessage $contact)
    {
        // Actualizamos el estado y registramos qué administrador lo atendió
        $contact->update([
            'status' => 'atendido',
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'El mensaje ha sido marcado como atendido.');
    }
}