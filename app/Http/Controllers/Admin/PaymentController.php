<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use PaypalMassPayment;


class PaymentController extends Controller
{
    public function transferAmount($id)
    {

        $user = User::findOrFail($id);
        $amount =  $user->balance;

        if($user->connect_type == 'stripe')
        {


            $stripe_response = $this->transferViaStripe($user, $amount);

            if($stripe_response == 'succeeded')
            {
                return redirect()->route('admin.finance.homeopath.revenue')->withMessage('Payments has been transfered.');
            }

                return redirect()->route('admin.finance.homeopath.revenue')->withError($stripe_response);
        }


    #===================================================================================================================
                                                   #PAYPAL TRANSFER
    #===================================================================================================================

        $response = $this->transferViaPaypal($user, $amount);
        
        if($response == true)
        {
            return back()->withMessage('Payments has been transfered to your paypal account.');
        }
        return back()->withError($response);

    #===================================================================================================================
                                                #END PAYPAL TRANSFER
    #===================================================================================================================
        

    }


    public function transferViaStripe($user, $amount)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try
        {
            $transfer = \Stripe\Transfer::create(array(
                "currency" => 'CAD',
                "amount" => $amount,
                "destination" => $user->stripe_connect,
                "transfer_group" => $user->id,
            ));


            if($transfer)
            {   
                Transaction::create([
                    'user_id'        => $user->id,
                    'payment_method' => 'stripe',
                    'amount'         => $amount
                ]);

                User::whereId($user->id)->update(['balance' => 0]);
                
                return 'succeeded';
            }
        }
        catch(\Exception $e)
        {

            return $e->getMessage();
        }


    }





    public function transferViaPaypal($user, $amount)
    {
        
        $receivers = array(
          0 => array(
            'ReceiverEmail' => $user->paypal_connect, 
            'Amount'        => $amount,
            'UniqueId'      => $user->id, 
            'Note'          => "Payment by CHWG Platform"), 
        );
            
        $response = PaypalMassPayment::executeMassPay('Payment by CHWG Platform', $receivers);

        if($response['ACK'] == 'Success')
        {
            User::whereId($user->id)->update(['balance' => 0]);
            return true;
        }
        else
        {
            return 'Something went wrong try again later. '. $response['L_LONGMESSAGE0'] ?? '';
        }

    }




}
