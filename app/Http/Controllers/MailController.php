<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class MailController extends Controller
{
    // This function sends an Email to ericalpizar
    public function sendMail(){
        Mail::to("ericalpizar@gmail.com")->send(new ContactUs());
        return view('guest_layout');
    }
}
