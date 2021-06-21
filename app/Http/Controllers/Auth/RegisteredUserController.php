<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'username' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::where('id', $request->id)->first();
        if ($user->url_image != "https://res.cloudinary.com/hyi9bajzn/image/upload/v1624269240/avatar_2_x2jw2c.png") {
            cloudinary()->uploadApi()->destroy($user->cloudinary_id);
        };
        $user->delete();
        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return Inertia::render('Admin/EditUser', [
            'user' => $user
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
        $oldUser = User::where('id', $request->id)->first();
        $oldUser->name = $request->name;
        $oldUser->username = $request->username;
        $oldUser->email = $request->email;
        $oldUser->save();
        return redirect('/admin/users');
    }
}
