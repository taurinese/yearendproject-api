<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "body" => "required",
            "active" => "required|boolean",
            "published_at" => "required",
            "url_image" => "required"
        ]);
        // dd($request->url_image->getClientOriginalName());
        // $url_image = $request->input('url_image')->originalName;

        $image_name = uniqid("posts_");
        // Store the uploaded file in the "lambogini" directory on Cloudinary with the filename "prosper"
        $result = $request->url_image->storeOnCloudinaryAs('posts', $image_name);
        /* $inputs = [
            "title" => $request->title,
            "body" => $request->body,
            "active" => $request->active,
            "published_at" => $request->published_at,
            "url_image" => $result->getPath()
        ]; */
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->active = $request->active;
        $post->published_at = $request->published_at;
        $post->url_image = $result->getPath();
        $post->cloudinary_id = $result->getPublicId();
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        cloudinary()->uploadApi()->destroy($post->cloudinary_id);
        $post->delete();
        return redirect()->back();
    }
}
