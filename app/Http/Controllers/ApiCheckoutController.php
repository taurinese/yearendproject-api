<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;

class ApiCheckoutController extends Controller
{
    public function getPlans()
    {
        $plans = Plan::all();
        return response()->json($plans, 200);
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
        // return response()->json($plan);

        if ($request->user()->subscribed('gratuit')) {
            $request->user()->subscription('gratuit')->cancelled();
        }
        
        try {
            $subscription = $request->user()
                ->newSubscription($plan->name, $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            return response()->json([$subscription, 'user' => Auth::user()]);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
