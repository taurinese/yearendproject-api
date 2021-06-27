<?php

namespace App\Http\Middleware;

use App\Models\Plan;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'stripe_key' => env('VUE_APP_STRIPE_PUBLIC_KEY'),
            'auth' => [
                'user' => $request->user(),
            ],
            'news' => Post::where('active', true)->where('published_at', '<=', Carbon::now()->toDateString())->paginate(6),
            'current_subscription' => $request->user() ? Plan::where('name', '=', $request->user()->subscriptions()->first()->name)->first() : null,
            'current_payment' => $request->user() ? $request->user()->defaultPaymentMethod() : null,
            'admin' => $request->user() ? $request->user()->isAdmin : null,
            'config' => config('data'),
            'billing_url' => $request->user() ? $request->user()->billingPortalUrl(route('profile')) : ''
        ]);
    }
}
