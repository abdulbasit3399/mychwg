<?php

namespace App\Http\Controllers\Homeopath;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Str;

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
        $role = Str::upper(Auth::user()->role);

        $monthly_plan = env($role.'_MONTHLY_PLAN_HEL');
        $yearly_plan = env($role.'_YEARLY_PLAN_HEL');
        
        $old_sub = Subscription::where('user_id', auth()->user()->id)->first();

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://secure.myhelcim.com/api/recurring/recurring-plan-view', [
        'form_params' => [
            'recurringPlanId' => $monthly_plan
        ],
        'headers' => [
            'accept' => 'application/xml',
            'account-id' => '2500365012',
            'api-token' => 'jZw5bx7fbMB3XYC2a9RzkBm69',
            'content-type' => 'application/x-www-form-urlencoded',
        ],
        ]);
        $monthly_plan = simplexml_load_string($response->getBody());
        $monthly_plan = json_encode($monthly_plan);


        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://secure.myhelcim.com/api/recurring/recurring-plan-view', [
        'form_params' => [
            'recurringPlanId' => $yearly_plan
        ],
        'headers' => [
            'accept' => 'application/xml',
            'account-id' => '2500365012',
            'api-token' => 'jZw5bx7fbMB3XYC2a9RzkBm69',
            'content-type' => 'application/x-www-form-urlencoded',
        ],
        ]);
        $yearly_plan = simplexml_load_string($response->getBody());
        $yearly_plan = json_encode($yearly_plan);

        return view('front.subscription.index', get_defined_vars());
    }

    public function createSubscription(Request $request)
    {


        try
        {
            $user = auth()->user();
            $paymentMethod = $request->paymentMethod;
            $sub=Subscription::where('user_id',auth()->user()->id)->get();
            if($sub!==null)
            {
                foreach($sub as $subsc)
                {
                    $subsc->delete();
                }
            }

            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);

            $subscription=$user->newSubscription('default', env('YEARLY_PLAN'))
                ->trialDays(30)
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );





            return redirect()->route('redirect.dashboard')->with('message', 'Welcome to Dashboard, Your subscription has been created.');

        }
        catch (\Exception $e)
        {
            $error = $e->getMessage();

            return back()->withError($error);
        }



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


}
