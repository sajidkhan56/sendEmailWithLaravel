<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function getData(Request $request)
    {
        $details = [
            'subject' => $request->input('subject'),
            'body' =>  $request->input('body')
        ];

        Mail::to($request->input('email'))->send(new \App\Mail\sendMailController($details));
        
        return back()->with('success', "Email Send");
    }
}
