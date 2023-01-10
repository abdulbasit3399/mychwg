<?php

namespace App\Http\Controllers\Homeopath;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Subscription;
use App\Models\SquareSubscription;
use Carbon\Carbon;
use Str;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;

class SubscriptionController extends Controller
{

  protected $stripe;

  public function __construct()
  {
    $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
  }

  public function subscriptionPaymentStripe()
  {
    $role = Str::upper(Auth::user()->role);

    $monthly_plan = env($role.'_MONTHLY_PLAN');
    $yearly_plan = env($role.'_YEARLY_PLAN');

    $old_sub = Subscription::where('user_id', auth()->user()->id)->first();

    $monthly_plan_session = $this->stripe->checkout->sessions->create([
      'success_url' => route('payment.succeed'),
      'cancel_url' => route('subscription.payment'),
      'line_items' => [
        [
          'price'    => $monthly_plan,
          'quantity' => 1,
        ],
      ],
      'customer_email' =>  Auth::user()->email,
      'mode' => 'subscription',
      'subscription_data' => !$old_sub ? [
        'trial_period_days' => 30
      ] : []
    ]);

    $yearly_plan_session = $this->stripe->checkout->sessions->create([
      'success_url' => route('payment.succeed'),
      'cancel_url' => route('subscription.payment'),
      'line_items' => [
        [
          'price'    => $yearly_plan,
          'quantity' => 1,
        ],
      ],
      'customer_email' =>  Auth::user()->email,
      'mode' => 'subscription',
      'subscription_data' => !$old_sub ? [
        'trial_period_days' => 30
      ] : []
    ]);


    return view('front.subscription.index', get_defined_vars());
  }

  public function subscriptionPayment()
  {
    $user = User::find(Auth::id());
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('POST', 'https://secure.myhelcim.com/api/customer/modify', [
        //   'form_params' => [
        //     'contactName' => $user->name,
        //     'businessName' => $user->user_name,
        //     'billing_email' => $user->email,
        //     'allowEmptyFields' => 1
        //   ],
        //   'headers' => [
        //     'accept' => 'application/xml',
        //     'account-id' => env('HELCIM_ACCOUNT_ID'),
        //     'api-token' => env('HELCIM_API_TOKEN'),
        //     'content-type' => 'application/x-www-form-urlencoded',
        //   ],
        // ]);
        // $customer = simplexml_load_string($response->getBody());
        // if(isset($customer->response) && $customer->response == 1){
        //     $user->helcim_connect = $customer->customer->customerCode;
        //     $user->save();
        // }


    $role = Str::upper(Auth::user()->role);

    $monthly_plan = env($role.'_MONTHLY_PLAN_SQUARE');
    $yearly_plan = env($role.'_YEARLY_PLAN_SQUARE');
    $old_sub = Subscription::where('user_id', auth()->user()->id)->first();


    return view('front.subscription.index', get_defined_vars());
  }

  public function createSubscription($id)
  {
    $role = Str::upper(Auth::user()->role);
    $monthly_plan = env($role.'_MONTHLY_PLAN_SQUARE');
    $yearly_plan = env($role.'_YEARLY_PLAN_SQUARE');

    if($monthly_plan == $id)
      $plan_interval = 'Monthly';
    elseif($yearly_plan == $id)
      $plan_interval = 'Yearly';

    $data = array(
     'customer_id' => auth()->user()->stripe_id,
     'plan_id' => $id,
     'location_id' => env('LOCATION_ID')
    );
    $url = env('SQUARE_API_URL')."/v2/subscriptions";
    $client = new \GuzzleHttp\Client();
    $response = $client->post($url, [
      'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer '.env('SQUARE_ACCESS_TOKEN')],
      'body'    => json_encode($data)
    ]);
    $response = json_decode($response->getBody(), true);


    $client = new SquareClient([
      'accessToken' => env('SQUARE_ACCESS_TOKEN'),
      'environment' => Environment::SANDBOX,
    ]);
    $api_response = $client->getCatalogApi()->retrieveCatalogObject($id);

    if ($api_response->isSuccess()) {
      $result = $api_response->getResult()->getObject()->getSubscriptionPlanData()->getPhases();
    } else {
      $result = $api_response->getErrors();
    }

    $days = 0;
    foreach ($result as $key => $rslt) {
      if($rslt->getOrdinal() == 0)
      {
        $date = date('Y-m-d');
        $user = User::find(auth()->user()->id);
        $days = $rslt->getPeriods();

        $subscription = new SquareSubscription;
        $subscription->user_id = $user->id;
        $subscription->subscription_type = 'trial';
        $subscription->plan_id = $id;
        $subscription->trial_ends_at = date('Y-m-d', strtotime($date. ' '.$days.' days'));
        $subscription->plan_interval = $plan_interval;
        $subscription->amount = 0;
        $subscription->save();

        $date = date('Y-m-d');
        $user->subscription_type = 'trial';
        $user->subscription_id = $response['subscription']['id'];
        $user->subscription_ends = date('Y-m-d', strtotime($date. ' +'.$days.' days'));
        $user->save();

        return redirect()->route('redirect.dashboard');
      }
    }

    foreach ($result as $key => $rslt) {
      if($rslt->getOrdinal() == 1)
      {
        if($rslt->getCadence() == 'MONTHLY')
          $days = 30;
        elseif($rslt->getCadence() == 'ANNUAL')
          $days = 365;
        elseif($rslt->getCadence() == 'WEEKLY')
          $days = 7;


        $date = date('Y-m-d');
        $user = User::find(auth()->user()->id);

        $subscription = new SquareSubscription;
        $subscription->user_id = $user->id;
        $subscription->subscription_type = 'subscription';
        $subscription->plan_id = $id;
        $subscription->trial_ends_at = date('Y-m-d', strtotime($date. ' '.$days.' days'));
        $subscription->plan_interval = $rslt->getCadence();
        $subscription->amount = $rslt->getRecurringPriceMoney()->getAmount() / 100;
        $subscription->save();

        $date = date('Y-m-d');
        $user->subscription_type = 'subscription';
        $user->subscription_id = $response['subscription']['id'];
        $user->subscription_ends = date('Y-m-d', strtotime($date. ' +'.$days.' days'));
        $user->save();

        return redirect()->route('redirect.dashboard');
      }
    }

    return redirect()->route('redirect.dashboard');
    return redirect()->back()->withError('Invoice sent to your registered email, please Pay invoice and refresh this page.');

  }

  public function cancelSubscription()
  {
    $user = auth()->user();
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $sub = Subscription::where('user_id',$user->id)->first();
    if($sub) {
      $subscription_id = $sub->stripe_id;
      $stripe_subscription = \Stripe\Subscription::retrieve($subscription_id);
      if($stripe_subscription){

        if($stripe_subscription->status=='canceled'){
          return response()->json(['success'=>0,'msg'=>'Subscription already cancelled']);
        }else {
          $cancel_subscription = $stripe_subscription->cancel();

          if ($cancel_subscription && $cancel_subscription->status == 'canceled') {
            $sub->stripe_status = 'canceled';
            $sub->save();
            $user->trial_ends_at = null;
            $user->save();

            return response()->json(['success' => 1, 'msg' => 'Subscription successfully cancelled']);
          } else {
            return response()->json(['success' => 0, 'msg' => 'Subscription not cancelled. Please contact to support']);
          }
        }
      }else{
        return response()->json(['success'=>0,'msg'=>'No subscription found']);
      }
    }else{
      return response()->json(['success'=>0,'msg'=>'No active subscription found']);
    }
  }



  public function subscriptionCancel()
  {
    $user = Auth::user();
    $user->subscription('default')->cancelNow();
    return redirect()->route('index')->with('message', 'Subscription has been Canceled at CHWG.');
  }
  public function subscriptionExpire()
  {
    return view('front.subscription.expire');
  }

}
