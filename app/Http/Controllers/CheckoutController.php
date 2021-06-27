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

        /* if ($request->user()->subscribed('gratuit')) {
            $request->user()->subscription('gratuit')->cancelled();
        } */

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

    public function swapSubscribe(Request $request)
    {
        $currentPlan = $request->user()->subscriptions()->first();
        $plan = Plan::find($request->plan);
        // dd($currentPlan, $plan);
        $result = $request->user()->subscription($currentPlan->name)->swap($plan->stripe_id);
        return response()->json($result);
    }


    public function freeSubscribe(Request $request)
    {
        $plan = Plan::where('name', '=', 'gratuit')->first();
        try {
            $subscription = $request->user()
                ->newSubscription($plan->name, $plan->stripe_id)
                ->create();
            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
