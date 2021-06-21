<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            "avatar" => 'required'
        ]);
        $user = Auth::user();
        if ($user->cloudinary_id) {
            cloudinary()->uploadApi()->destroy($user->cloudinary_id);
        }
        $image_name = uniqid("posts_");
        $result = $request->url_image->storeOnCloudinaryAs('users', $image_name);
        $user->url_image = $result->getPath();
        $user->cloudinary_id = $result->getPublicId();

        dd($result);
    }
}
