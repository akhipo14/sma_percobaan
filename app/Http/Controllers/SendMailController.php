<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
Use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SendMailController extends Controller
{
    public function sendMail(Request $request){

        $message = [
            'name.required' =>'Tidak boleh kosong',
            'email.email' =>'Harus berupa email',
            'email.required' =>'Tidak boleh kosong',
            'phone.required' =>'Tidak boleh kosong',
            'phone.regex' =>'Mulai dengan 08',
            'phone.min' =>'Minimal 10 angka',
            'phone.max' =>'Maksimal 15 angka',
            'body.required' =>'Tidak boleh kosong',
            'subject.required' =>'Tidak boleh kosong',

        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:10|max:15|regex:/(08)[0-9]{9}/',
            'body' => 'required|string',
            'subject' => 'required|string',
        ],$message);
    
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
