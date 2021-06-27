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
                return;
            });
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function sendApi(Request $request)
    {
        // return response()->json([$request->all()]);
        $request->validate([
            "email" => 'required|email',
            "name" => 'required|string',
            "subject" => 'required|string',
            "body" => 'required|string'
        ]);
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
            return response()->json(["success" => "Mail sent!"], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => "Erreur lors de l'envoi du mail"], 500);
        }
    }
}
