<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::inertia('/search', 'Search');
Route::inertia('/news', 'News');
Route::inertia('/contact', 'Contact');
Route::inertia('/new', 'New');
Route::inertia('/library', 'Library');
Route::inertia('/playlist', 'Playlist');
Route::inertia('/checkout2', 'Checkout2');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::post('/upload/avatar', [ProfileController::class, 'updateAvatar']);


Route::middleware('auth')->group(function () {
    Route::inertia('/account', 'Account');
});

Route::inertia('/admin/', 'Admin/Dashboard');
Route::get('/admin/users', [AdminController::class, 'userDashboard']);
Route::get('/admin/posts', [AdminController::class, 'newsDashboard']);
Route::delete('/admin/posts/delete', [PostController::class, 'delete']);
Route::post('/admin/posts/create', [PostController::class, 'store']);
Route::post('/admin/posts/edit', [PostController::class, 'edit']);
Route::post('/admin/posts/update', [PostController::class, 'update']);


require __DIR__ . '/auth.php';
