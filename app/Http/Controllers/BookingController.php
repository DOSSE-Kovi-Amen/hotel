<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;

class BookingController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'room_id' => 'required|exists:rooms,id',
        ]);

        Mail::to(config('mail.from.address'))->send(new BookingMail($validated));

        return back()->with('success', 'Votre réservation a bien été envoyée.');
    }
}
