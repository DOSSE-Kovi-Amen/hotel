<?php

// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Envoi de l'email à l'equipe de gestion du sitey
        Mail::to('contact@hotel-chic-palace.com')->send(new ContactFormMail($validated));

        return back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}