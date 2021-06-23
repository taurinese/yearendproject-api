<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Cashier\Subscription;

class AdminController extends Controller
{
    public function userDashboard()
    {
        $users = User::all();
        return Inertia::render('Admin/Users', [
            'users' => $users
        ]);
    }

    public function newsDashboard()
    {
        $posts = Post::all();
        return Inertia::render('Admin/Posts', [
            'posts' => $posts
        ]);
    }

    public function subscribeDashboard()
    {
        $subs = Subscription::query()->active()->get();
        // dd($subs);
        return Inertia::render('Admin/Subscriptions', [
            'subscriptions' => $subs
        ]);
    }
}
