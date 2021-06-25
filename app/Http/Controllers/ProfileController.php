<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
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
        $result = $request->avatar->storeOnCloudinaryAs('users', $image_name);
        $user->url_image = $result->getPath();
        $user->cloudinary_id = $result->getPublicId();
        $user->save();

        return redirect()->back();
    }

    public function updateName(Request $request)
    {
        $request->validate([
            "name" => 'required'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->back();
    }

    public function updateUsername(Request $request)
    {
        $request->validate([
            "username" => 'required'
        ]);
        $user = Auth::user();
        $user->username = $request->username;
        $user->save();

        return redirect()->back();
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            "email" => 'required|email'
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            "currentPassword" => 'required|string|min:8',
            "newPassword" => 'required|string|min:8',
            "confirmPassword" => 'required|string|min:8'
        ]);
        $user = Auth::user();
        if (Hash::check($request->currentPassword, $user->password)) {
            if ($request->newPassword == $request->confirmPassword) {
                $user->password = Hash::make($request->newPassword);
                $user->save();
                return response()->json(['messages' => "Password has been successfully changed."], 200);
            } else {
                return response()->json(['errors' => ['0' => ['0' => "New password and confirmation don't match."]]], 422);
            }
        } else {

            return response()->json(['errors' => ['0' => ['0' => "Current password doesn't match."]]], 422);
        }
    }
}
