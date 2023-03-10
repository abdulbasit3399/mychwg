<?php

namespace App\Http\Controllers;

use DB;
use URL;
use Session;
use Redirect;
use Input;
use Crypt;
use App\Models\HomeopathService;
use App\Models\HomeopathProfile;
use App\Models\Subscription;
use App\Models\UserPayment;
use App\Models\ServiceBooking;
use App\Models\SquareSubscription;
use App\Models\User;
use Auth;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use App\Jobs\UserServiceBookedMailJob;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Traits\PaymentMethod;
use Illuminate\Http\Request;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;

class PaymentController extends Controller
{
  use PaymentMethod;


  public function makeCheckout(Request $req)
  {
    $req['service_id'] = Crypt::encryptString($req->service_id);

    Session::put('booking_form', $req->all());
    $service = HomeopathService::findOrFail(Crypt::decryptString($req->service_id));
    if($req->payment_method == 'pay-later')
    {

     $homeopath=HomeopathProfile::where('user_id',$service->user_id)->first();

     $data=getAllTimeSlots($req->time_slot,$service->duration??30);
     $data=json_encode($data);

     $booking = ServiceBooking::create([
      'user_id'                 => Auth::id(),
      'homeopath_id'             => $req->homeopath_id,
      'uuid'                    => date('dmyhis'),
      'homeopath_service_id'    => $service->id,
      'date'                    => $req->date,
      'time_slot'               => $data,
      'illness'                 => $req->illness ?? NULL,
      'allergies'               => $req->allergies ?? NULL,
      'concern'                 => $req->concern ?? NULL,
      'price'                   => $service->price,
      'payment_method'          => 'pay-later',
      'later_pay_method'          => $req->later_pay_method??'',
      'meeting_handel_via'      => $req->meeting_handled_via??'',

    ]);
     $payment_status = true;


     $data = [
      'name'     => env('APP_NAME'),
      'email'    => Auth::user()->email,
      'app_name' => env('APP_NAME'),
      'subject'  => 'Your booking has been done for service appointment',
    ];

    dispatch(new UserServiceBookedMailJob($data))->delay(now()->addSeconds(2));

    return view('front.services.book_receipt', get_defined_vars());
  }
  if($req->payment_method == 'paypal')
  {

    $data = [
      'time_slot'         =>$req->time_slot,
      'meeting_handled_via'         =>$req->meeting_handled_via,
      'price'             => serviceAmount($service->price,$service->homeopath->HomeopathProfile->location),
      'payer_email'       => Auth::user()->email,
      'currency'          => 'CAD',
      'quantity'          => 1,
      'description'       => 'Appointment Booking at IHWG',
      'success_url'       => route('paypal.payment.success'),
      'cancel_url'        => route('paypal.payment.success')
    ];

    return $this->makePaypalCheckout($data);
  }
  else
  {
    $client = new \Square\SquareClient([
        'accessToken' => $service->homeopath->square_access_token,
        'environment' => \Square\Environment::SANDBOX, // Change this to \Square\Environment::PRODUCTION for testing
    ]);

    $amount_money = new \Square\Models\Money();
    $amount_money->setAmount($service->price*100);
    $amount_money->setCurrency(env('CURRENCY'));

    $body = new \Square\Models\CreatePaymentRequest(
        $req->square_tok,
        time(),
        $amount_money
    );

    $api_response = $client->getPaymentsApi()->createPayment($body);
    if ($api_response->isSuccess()) {
        $result = $api_response->getResult();
    } else {
        $result = $api_response->getErrors();
    }

    if($api_response->isSuccess())
    {
      $data=getAllTimeSlots($req->time_slot,$service->duration??30);
      $data=json_encode($data);


      $booking = ServiceBooking::create([
        'user_id'                 => Auth::id(),
        'homeopath_id'            => $req->homeopath_id,
        'uuid'                    => date('dmyhis'),
        'homeopath_service_id'    => $service->id,
        'date'                    => $req->date,
        'time_slot'               => $data,
        'illness'                 => $req->illness ?? NULL,
        'allergies'               => $req->allergies ?? NULL,
        'concern'                 => $req->concern ?? NULL,
        'price'                   => $service->price,
        'transaction_id'          => $result->getPayment()->getId(),
        'payment_method'          => 'square',
        'meeting_handel_via'      => $req->meeting_handled_via??''

      ]);
      $payment_status = true;


      $data = [
        'name'     => env('APP_NAME'),
        'email'    => Auth::user()->email,
        'app_name' => env('APP_NAME'),
        'subject'  => 'Your booking has been confirmed for service appointment',
      ];

      dispatch(new UserServiceBookedMailJob($data))->delay(now()->addSeconds(2));

      return view('front.services.book_receipt', get_defined_vars());

    }
    else
    {
      $error = 'Payment failed.';
      return view('errors.payments_error', get_defined_vars());
    }

  }

}


public function paypalPaymentSuccess(Request $request)
{

 $response = $this->paypalPaymentSuceess($request->all());


 if ($response->getState() == 'approved')
 {

  $service = HomeopathService::findOrFail(Crypt::decryptString(Session::get('booking_form')['service_id']));

  $data=getAllTimeSlots(Session::get('input_time_slot'),$service->duration??30);
  $data=json_encode($data);

  $booking = ServiceBooking::create([
    'user_id'                 => Auth::id(),
    'homeopath_id'            => $service->user_id??'',
    'uuid'                    => date('dmyhis'),
    'homeopath_service_id'    => $service->id,
    'date'                    => Session::get('booking_form')['date'],
    'time_slot'               => $data,
    'illness'                 => Session::get('booking_form')['illness'] ?? NULL,
    'allergies'               => Session::get('booking_form')['allergies'] ?? NULL,
    'concern'                 => Session::get('booking_form')['concern'] ?? NULL,
    'price'                   => $service->price,
    'transaction_id'          => $response->transactions[0]->related_resources[0]->sale->id,
    'payment_method'          => 'paypal',
    'meeting_handel_via'          => Session::get('meeting_handled_via')??'online',

  ]);

  $payment_status = true;


  $data = [
    'name'     => env('APP_NAME'),
    'email'    => Auth::user()->email,
    'app_name' => env('APP_NAME'),
    'subject'  => 'Your booking has been confirmed for service appointment',
  ];

  dispatch(new UserServiceBookedMailJob($data))->delay(now()->addSeconds(2));

  return view('front.services.book_receipt', get_defined_vars());

}

return redirect()->route('index')->with('error','Payment failed! Try again later.');



}



public function intent(Request $request)
{


  \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

  header('Content-Type: application/json');

        # retrieve json from POST body
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);


  $intent = null;
  try {
    if (isset($json_obj->payment_method_id)) {
                # Create the PaymentIntent
      if (isset($json_obj->location)){
        $location = $json_obj->location;
        $amount = serviceAmount($json_obj->amount,$location) *100;
      }else{

        $amount = $json_obj->amount *100;
      }



      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $intent = \Stripe\PaymentIntent::create([
        'payment_method' => $json_obj->payment_method_id,
        'amount' => $amount,
        'currency' => 'CAD',
        'confirmation_method' => 'manual',
        'capture_method' => 'manual',
        'confirm' => true,
        'description' => auth()->user()->email.' booked Service via Stripe',
      ]);


    }


    if (isset($json_obj->payment_intent_id)) {
      $intent = \Stripe\PaymentIntent::retrieve(
        $json_obj->payment_intent_id
      );
      $intent->confirm();
    }
    $this->generateResponse($intent);
  } catch (\Stripe\Exception\ApiErrorException $e) {
            # Display error on client
    echo json_encode([
      'error' => $e->getMessage()
    ]);
  }


}

public function generateResponse($intent)
{


  if ($intent->status == 'requires_source_action' && $intent->next_action->type == 'use_stripe_sdk')
  {
    echo json_encode([
      'requires_source_action' => true,
      'payment_intent_client_secret' => $intent->client_secret
    ]);
  }
  else if ($intent->status == 'requires_capture')
  {
            # The payment didn’t need any additional actions and completed!
            # Handle post-payment fulfillment
    Session::put('intent_id',$intent->id);

    echo json_encode([
      "success" => true
    ]);
  }
  else
  {
            # Invalid status
    http_response_code(500);
    echo json_encode(['error' => 'Invalid PaymentIntent status']);
  }

}

    /*
    |--------------------------------------------------------------------------
    | STRIPE WEBHOOK METHODS
    |--------------------------------------------------------------------------
    |
    */

    public function startTrial(Request $req)
    {
      $data = $req['data']['object'];

      if($data['mode'] == 'subscription' && $data['status'] == 'complete')
      {
        $user = User::whereEmail($data['customer_email'])->first();
        try
        {
          $old_sub = Subscription::where('user_id', $user->id)->first();

          $subscription = $this->stripe->subscriptions->retrieve(
            $data['subscription']
          );
          $stripe_price = $subscription['plan']['id'];
          $plan_interval = $subscription['plan']['interval'];

          if(empty($old_sub))
          {
            $user->trial_ends_at = now()->addDays(1);
                    // $user->trial_ends_at = now()->addDays(30);
            $user->stripe_id = $req['data']['object']['customer'];
            $user->save();

            $status = 'on_trial';
            $amount = '0.0';
            $ends_at = null;
            \Log::info('Trial has been started of User '. $user->email);
          }
          else
          {
            $status = 'active';
            $amount = $subscription['plan']['amount']/100;
            $ends_at = $plan_interval == 'year' ? now()->addYears(1) : now()->addMonths(1);
            $old_sub->delete();
            \Log::info('Subscription has been restarted of User '. $user->email);
          }

          Subscription::create([
            'user_id' => $user->id,
            'name'   => 'default',
            'stripe_id' => $subscription['id'],
            'stripe_status' => $status,
            'stripe_price' => $stripe_price ?? '',
            'amount' => $amount,
            'plan_interval' => $plan_interval ?? 'other',
            'quantity' => 1,
            'ends_at' => $ends_at
          ]);
        }
        catch (\Throwable $th) {

        }
      }
    }
    
    public function startSubscription(Request $request)
    {
      $customer_id = $request['data']['object']['customer'];
      $billing_reason=$request['data']['object']['billing_reason'];
      $amount=$request['data']['object']['amount_paid']/100;
      if($billing_reason=='subscription_cycle')
      {
       $user = User::where('stripe_id',$customer_id)->first();
       $subs = Subscription::where('user_id',$user->id)->first();
       $subs->ends_at = $subs->plan_interval == 'year' ? now()->addYears(1) : now()->addMonths(1);
       $subs->amount += $amount;
       $subs->status = 'active';
       $subs->save();

       \Log::info('Subscription has been renewed of User '. $user->email);
     }

     return 'success';
   }
   public function square_webhook(Request $request)
   {
    $date = date('Y-m-d');

    $user = User::where('stripe_id',$request->data['object']['subscription']['customer_id'])->first();

    if($request->type == 'subscription.created')
    {
      if($user)
      {
        $subscription = SquareSubscription::where('user_id',$user->id)->first();
        $subscription->subscription_id = $request->data['object']['subscription']['id'];
        $subscription->plan_id = $request->data['object']['subscription']['plan_id'];
        $subscription->subscription_name = 'default';
        // $subscription->trial_ends_at = date('Y-m-d', strtotime($date. ' +7 days'));
        // $subscription->amount = 0;
        $subscription->save();

        // $user->subscription_type = 'trial';
        $user->subscription_id = $request->data['object']['subscription']['id'];
                // $user->subscription_ends = date('Y-m-d', strtotime($date. ' +7 days'));
        $user->save();
      }
    }
    elseif($request->type == 'subscription.updated')
    {
      $invoices = $request->data['object']['subscription']['invoice_ids'];
      foreach ($invoices as $key => $inv) {

        $payment = UserPayment::where([['user_id',$user->id],['invoice_id',$inv]])->first();
        if(!$payment)
        {
          $new_payment = new UserPayment;
          $new_payment->user_id = $user->id;
          $new_payment->invoice_id = $inv;
          $new_payment->plan_id = $request->data['object']['subscription']['plan_id'];
          $new_payment->save();

          $url = env('SQUARE_API_URL')."/v2/invoices/".$inv;
          $client = new \GuzzleHttp\Client();
          $response = $client->get($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer '.env('SQUARE_ACCESS_TOKEN')],
          ]);
          $result = json_decode($response->getBody(), true);
          $payment = $result['invoice']['payment_requests'][0]['total_completed_amount_money']['amount'];
          $payment = $payment / 100;

          $new_payment->payment = $payment;
          $new_payment->save();

          if($request->data['object']['subscription']['charged_through_date'])
          {
            $user->subscription_ends = $request->data['object']['subscription']['charged_through_date'];
            $user->save();
            $subscription = SquareSubscription::where('user_id',$user->id)->first();
            $subscription->subscription_type = 'subscription';
            $subscription->amount = $payment;
            $subscription->ends_at = $request->data['object']['subscription']['charged_through_date'];
            $subscription->save();
          }


        }

      }


    }
    DB::table('test')->insert(['data' => json_encode($request->all())]);
    return $request->all();
  }


  public function subscription_cancel()
  {
    $url = env('SQUARE_API_URL')."/v2/subscriptions/".Auth::user()->subscription_id."/cancel";
    $client = new \GuzzleHttp\Client();
    $response = $client->post($url, [
      'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer '.env('SQUARE_ACCESS_TOKEN')],
    ]);
    $result = json_decode($response->getBody(), true);

    $squ = SquareSubscription::where('user_id',Auth::id())->update(['status' => 0]);

    return redirect()->back()->with('message','Subscription cancelled.');
  }


}
