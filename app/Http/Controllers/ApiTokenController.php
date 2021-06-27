<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiTokenController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->tokens()->where('tokenable_id', $user->id)->delete();

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'token' => $token,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'avatar' => $user->url_image,
            'isAdmin' => $user->isAdmin,
            'subscription' => $user->subscriptions()->first()
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json(['error' => 'You are already registered. Please login instead.']);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'username' => $request->username
        ]);

        $request->merge(['user' => $user]);

        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        // dd($request->user());
        app('App\Http\Controllers\CheckoutController')->freeSubscribe($request);

        $user = User::find($user->id);
        // dd($user);
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'token' => $token,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'avatar' => $user->url_image,
            'isAdmin' => $user->isAdmin,
            'subscription' => $user->subscriptions()->first()
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'username' => $request->user()->username,
            'avatar' => $request->user()->url_image,
            'isAdmin' => $request->user()->isAdmin,
            'subscription' => $request->user()->subscriptions()->first()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response(null, 204);
    }

    public function changeName(Request $request)
    {
        $request->validate([
            "name" => 'required|string'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        return response()->json([
            'name' => $user->name
        ], 200);
    }

    public function changeUsername(Request $request)
    {
        $request->validate([
            "username" => 'required|string'
        ]);
        $user = Auth::user();
        $user->username = $request->username;
        $user->save();
        return response()->json([
            'username' => $user->username
        ], 200);
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            "email" => 'required|email'
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'email' => $user->email
        ], 200);
    }

    public function changeAvatar(Request $request)
    {
        // NE FONCTIONNE PAS
        return response()->json([$request->file()]);
        $request->validate([
            "avatar" => 'required|file'
        ]);
        /* $user = Auth::user();
        $user->email = $request->email;
        $user->save(); */
        return response()->json([
            'avatar' => ''
        ], 200);
    }

    public function changePassword(Request $request)
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
