<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return $plans;
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

    public function createIntent()
    {
        return Auth::user()->createSetupIntent();
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'plan' => 'required|exists:plans,id',
            'coupon' => 'nullable'
        ]);


        $plan = Plan::find($request->plan);

        $subscription = Auth::user()->subscriptions()->first();
        if ($subscription) {
            return dd($subscription);
            Auth::user()->subscription('default')->swap('annuel');
        }

        try {
            $subscription = $request->user()
                ->newSubscription($plan->name, $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }

    public function freeSubscribe(Request $request)
    {
        $plan = Plan::where('name', '=', 'gratuit');
        try {
            $subscription = $request->user()
                ->newSubscription($plan->name, $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
