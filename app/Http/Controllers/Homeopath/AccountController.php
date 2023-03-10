<?php

namespace App\Http\Controllers\Homeopath;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AccountController extends Controller
{
    public function linkAccount()
    {
        return view('homeopath.accounts.index');
    }

    public function setAccount(Request $req)
    {


        $req->validate([
            'paypal_connect' => 'required|string|email|max:255|unique:users',
        ]);

        Auth::user()->update([
            'paypal_connect' => $req->paypal_connect,
            'connect_type'   => 'paypal'
        ]);

        return back()->withMessage('Congrats! Your paypal account has been connected.');

    }



    public function stripeConnect()
    {
        $user = auth()->user();

        $res=false;
        

        if($user->stripe_connect == null)
        {
           $res = $this->connectAccount($user->id);
        }
        if ($res==true)
        {
            $user = User::whereId(Auth::id())->first();
        }

        if($user->stripe_connect)
        {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            if($user->is_boarded == false)
            {

                $account_link = \Stripe\AccountLink::create([
                  'account' => $user->stripe_connect,
                  'refresh_url' => route('redirect.dashboard'),
                  'return_url' => route('homeopath.stripe.boarded'),
                  'type' => 'account_onboarding',
                ]);

                return redirect($account_link->url);
            }
            else
            {
                #FOR EXPRESS
                $account_link = \Stripe\Account::createLoginLink($user->stripe_connect);
                return redirect($account_link->url);
            }
        }

        return redirect()->back()->with('error', 'Something Went Wrong! Contact with admin');
    }




    public function connectAccount($id, $my_response = false)
    {

        $vendor = User::whereId($id)->first();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try
        {
            $account = \Stripe\Account::create(array(
                'country' => 'CA',
                'type' => 'express',
                'capabilities' => [
                    'card_payments' => [
                      'requested' => true,
                    ],
                    'transfers' => [
                      'requested' => true,
                    ],
                ]
            ));

            $vendor->stripe_connect = $account->id;
            $vendor->save();

            $my_response = true;
        }
        catch(\Exception $e)
        {
            if($my_response)
                return false;
        }

        if($my_response)
            return true;

    }

    public function stripeBoarded()
    {
       $user = User::whereId(Auth::id())->first();

       if($user->stripe_connect !== null)
       {
           $user->is_boarded   = true;
           $user->connect_type = 'stripe'; 
           $user->save();
       }


        return redirect()->route('homeopath.link.account')->withMessage('Congrats! Your stripe account has been linked.');
    }

    public function squareConnect(Request $request)
    {
        $this->validate($request,[
            'app_id' => 'required',
            'access_token' => 'required',
            'location_id' => 'required'
        ]);

        $user = User::whereId(Auth::id())->first();
        $user->is_boarded   = true;
        $user->square_app_id = $request->app_id; 
        $user->square_access_token = $request->access_token; 
        $user->square_location_id = $request->location_id; 
        $user->save();

        return redirect()->route('homeopath.link.account')->withMessage('Congrats! Your square account has been linked.');
    }







    
}
