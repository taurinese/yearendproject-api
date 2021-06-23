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
        // dd($request->all());
        try {
            Mail::send('emails.contact', ['user' => [
                'email' => $request->email,
                'name' => $request->name,
                'subject' => $request->subject,
                'body' => $request->body
            ]], function ($m) use ($request) {
                $m->from($request->email, $request->name);

                $m->to(env('MAIL_TO'), 'Spotifree')->subject('Vous avez un nouveau message!');
            });
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
