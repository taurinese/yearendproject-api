<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $this->sendMail($request, $plan);
            return response()->json([$subscription, 'user' => Auth::user()]);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }

    public function sendMail(Request $request, $data)
    {
        try {
            Mail::send('emails.user_subscription', ['plan' => $data, 'user' => [
                'name' => $request->user()->name,
                'last_four' => $request->user()->card_last_four,
                'created_at' => $request->user()->subscriptions()->first()
            ]], function ($m) use ($request) {
                $m->from(env('MAIL_FROM_ADDRESS'), 'Spotifree');
                $m->to(env('MAIL_TO'), 'Spotifree')->subject('Nouvel abonnement!');
                $m->to($request->user()->email, 'Spotifree')->subject('Nouvel abonnement!');
            });
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
