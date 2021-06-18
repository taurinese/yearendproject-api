<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendmail(Request $request)
    {
        $email = $request->email;
        Mail::to($email)->send(new Contact);
        return redirect()->home();
    }
}
