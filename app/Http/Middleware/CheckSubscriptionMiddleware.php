<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class CheckSubscriptionMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user->role == "homeopath" || $user->role == 'advocate')
        {
            // if($user->subscribed('default') || $user->onTrial())
            // {
            //     return $next($request);
            // }
            if($user->subscription_type == 'new')
            {
                return redirect()->route('subscription.payment')->withError('Please start your subscription.');
            }
            elseif($user->subscription_ends && strtotime($user->subscription_ends) >= strtotime(date('Y-m-d')))
            {
                return $next($request);
            }

            return redirect()->route('subscription.expire');
        }

        return $next($request);

    }
}
