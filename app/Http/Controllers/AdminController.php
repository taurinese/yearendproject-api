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
        $users = User::paginate(10);
        return Inertia::render('Admin/Users', [
            'users' => $users
        ]);
    }

    public function newsDashboard()
    {
        $posts = Post::paginate(10);
        return Inertia::render('Admin/Posts', [
            'posts' => $posts
        ]);
    }

    public function subscribeDashboard()
    {
        // $subs = Subscription::query()->active()->paginate(10);
        $users = User::whereNotNull('stripe_id')->paginate(10);
        foreach ($users as $user) {
            $user->sub = $user->subscriptions()->first();
        }
        // dd($users);
        return Inertia::render('Admin/Subscriptions', [
            'users' => $users
        ]);
    }
}
