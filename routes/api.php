<?php

use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth

Route::post('/auth/login', [ApiTokenController::class, 'login']);
Route::post('/auth/register', [ApiTokenController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/me', [ApiTokenController::class, 'me']);
    Route::get('/auth/logout', [ApiTokenController::class, 'logout']);
});

// Posts
Route::get('/posts', [ApiPostController::class, 'getPosts']);
Route::get('/posts/{id}', [ApiPostController::class, 'getPost']);
Route::post('/posts/search', [ApiPostController::class, 'search']);

// Contact

Route::post('/contact', function (Request $request) {
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
});
