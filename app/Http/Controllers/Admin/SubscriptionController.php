<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('id', 'DESC')->get();

        $group = Subscription::all()->groupBy('stripe_price');

        return view('admin.subscriptions.index', get_defined_vars());
    }
}
