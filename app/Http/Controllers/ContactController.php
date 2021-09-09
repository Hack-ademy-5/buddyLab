<?php

namespace App\Http\Controllers;

use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required|min:5|max:255'
        ]);

        // guardar el contacto en el db
        $contact = Contact::create($validatedData);
        // enviar el correo
        Mail::to($validatedData['email'])->send(new ContactReceived($contact));
        // salir
        return redirect()->route('home')->withMessage('Contacto enviado con exito');
    }
}
