<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\UserPayment;
use App\Models\SquareSubscription;
use DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = SquareSubscription::orderBy('id', 'DESC')->get();

        $group = SquareSubscription::groupBy('plan_id')->selectRaw('count(*) as total, plan_id, sum(amount) as total_rev')->get();
        $payments = UserPayment::orderBy('id', 'DESC')->get();

        return view('admin.subscriptions.index', get_defined_vars());
    }
}
