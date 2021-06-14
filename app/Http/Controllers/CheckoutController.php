<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return Inertia::render('Checkout', ['plans' => $plans]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'radio' => 'required'
        ]);
        dd($request->all());
        return Redirect::route('checkout');
    }
}
