<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

        /* $inputs = [
            "title" => $request->title,
            "body" => $request->body,
            "active" => $request->active,
            "published_at" => $request->published_at,
            "url_image" => $result->getPath()
        ]; */
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->active = $request->active;
        $post->published_at = $request->published_at;
        $image_name = uniqid("posts_");
        $result = $request->url_image->storeOnCloudinaryAs('posts', $image_name);
        $post->url_image = $result->getPath();
        $post->cloudinary_id = $result->getPublicId();
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

    public function edit(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        return Inertia::render('Admin/EditPost', [
            'post' => $post
        ]);
    }

    public function update(Request $request)
    {
        /*         $request->validate([
            "title" => "required",
            "body" => "required",
            "active" => "required|boolean",
            "published_at" => "required",
            "url_image" => "required"
        ]); */
        $oldPost = Post::where('id', $request->id)->first();
        // dd($request->all(), $oldPost);
        if ($oldPost->url_image !== $request->url_image) {
            $image_name = uniqid("posts_");
            cloudinary()->uploadApi()->destroy($oldPost->cloudinary_id);
            $result = $request->url_image->storeOnCloudinaryAs('posts', $image_name);
            $oldPost->url_image = $result->getPath();
            $oldPost->cloudinary_id = $result->getPublicId();
        }
        $oldPost->title = $request->title;
        $oldPost->body = $request->body;
        $oldPost->active = $request->active;
        $oldPost->published_at = $request->published_at;
        $oldPost->save();
        return redirect('/admin/posts');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->search;

        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('active', 1)
            ->where('published_at', '<', Carbon::now()->toDateString())
            ->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")->orWhere('body', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        // dd(count($posts), $posts);
        // Return the results
        return $posts;
    }

    public function view($id)
    {
        $post = Post::find($id);
        return Inertia::render('New', ['post' => $post]);
    }
}
