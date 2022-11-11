<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class CheckSubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user->role == "homeopath" || $user->role == 'advocate')
        {
            // if($user->subscribed('default') || $user->onTrial())
            // {
            //     return $next($request);
            // }
            if($user->subscription_ends && strtotime($user->subscription_ends) >= strtotime(date('Y-m-d')))
            {
                return $next($request);
            }

            return redirect()->route('subscription.payment')->withError('Your Subscribtion is not available now. Please pay invoice which is sent to your registered email.');
        }

        return $next($request);

    }
}
