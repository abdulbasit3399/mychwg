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
            if($user->subscribed('default') || $user->onTrial())
            {
                return $next($request);
            }

            return redirect()->route('subscription.payment')->withError('Your Subscribtion is not available now. Subscribe to continue services');
        }

        return $next($request);

    }
}
