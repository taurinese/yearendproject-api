<?php

use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ContactController;
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

Route::post('/contact', [ContactController::class, 'sendApi']);
