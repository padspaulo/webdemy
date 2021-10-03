<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
 
    public function contact(){

        return view('principal');
    }

    public function sendEmail(Request $request){

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject'=> $request->subject,
            'message' => $request->message
        ];

        Mail::to('testeudemy8@gmail.com')->send(new ContactMail($details));
        //return back()->with('mensagem_enviada','A mensagem foi enviada correctamente');
        return view('principal');
    }
}

