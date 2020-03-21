<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function show(){
        return view('pages.contact');
    }

    public function send(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:3',
        ]);
        Mail::to(config('mail.admin.address'))->send(new Message($data));
        return back()->with('message', 'Your message has to been sent!');
    }
}
