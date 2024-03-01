<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
Use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SendMailController extends Controller
{
    public function sendMail(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:10|max:15',
            'body' => 'required|string',
            'subject' => 'required|string',
        ]);
    
        $subject = $request->subject;
        $body = $request->body;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;

        FacadesMail::to('dueegiro@gmail.com')->send(new SendMail($subject, $body,$name,$phone,$email));
    
        toast('Email anda telah terkirim', 'success');
        return redirect()->back();
    }
}
