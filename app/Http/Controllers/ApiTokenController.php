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
        dd(Auth::user());
        return response()->json([], 200);
    }
}
