<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function getPosts()
    {
        $posts = Post::all();

        return response()->json($posts, 200);
    }

    public function getPost($id)
    {
        $post = Post::where('id', $id)->get();
        if (!$post)
            return response()->json([
                'success' => false,
                'error' => "This post doesn't exist"
            ], 404);
        return response()->json($post, 200);
    }
}
