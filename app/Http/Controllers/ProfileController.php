<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            "avatar" => 'required'
        ]);

        $result = $request->avatar->storeOnCloudinary();

        dd($result);
    }
}
