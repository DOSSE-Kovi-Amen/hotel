<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact'); // Ton Blade : resources/views/contact.blade.php
    }

    public function send(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            // Envoi de l’email
            Mail::to('contact@hotel-chic-palace.com')->send(new ContactMail($request->all()));

            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
        } catch (\Exception $e) {
            // Si l'envoi échoue
            return redirect()->back()->with('error', "Erreur lors de l'envoi du message : " . $e->getMessage());
        }
    }
}
