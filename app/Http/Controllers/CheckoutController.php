<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        if ($request->user()->subscribed('gratuit')) {
            $request->user()->subscription('gratuit')->cancel();
        }
        if ($request->user()->subscribed('mensuel')) {
            $request->user()->subscription('mensuel')->cancel();
        }
        if ($request->user()->subscribed('annuel')) {
            $request->user()->subscription('annuel')->cancel();
        }

        try {
            $subscription = $request->user()
                ->newSubscription($plan->name, $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            Mail::send('emails.subscription', ['plan' => $plan, 'user' => [
                'name' => $request->user()->name,
                'last_four' => $request->user()->card_last_four,
                'created_at' => $request->user()->subscriptions()->first()->created_at
            ]], function ($m) use ($request) {
                $m->from(env('MAIL_FROM_ADDRESS'), 'Spotifree');
                $to = [env('MAIL_TO'), $request->user()->email];
                $m->to($to, 'Spotifree')->subject('Nouvel abonnement!');
                // $m->to($request->user()->email, 'Spotifree')->subject('Nouvel abonnement!');
            });
            return response()->json([$subscription, 'user' => Auth::user()]);
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

    public function sendMail(Request $request, $data)
    {
        return response()->json([$request, $data]);
        try {
            Mail::send('emails.subscription', ['plan' => $data, 'user' => [
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
            return $th;
        }
    }
}
