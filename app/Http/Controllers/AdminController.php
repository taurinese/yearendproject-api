<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
