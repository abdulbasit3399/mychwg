@extends('layouts.homeopath')
@section('title','Link Accounts')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    .link_accounts *
    {
        font-family: 'Inconsolata', monospace;
    }
    .paypal-logo
    {
        width: 25%;
    }
    h1,h2,h3,h4,h5,h6, p
    {
        color: #A4A4A4;
    }
</style>
@endsection

@section('heading','Link Accounts')
@section('content')




<div class="row link_accounts">

    @if(Auth::user()->connect_type != "")
        <div class="col-sm-12 text-center">
            <h3>Your <strong class="text-success">"{{ Auth::user()->connect_type }}"</strong> account is linked with the CHWG Platform.</h3>
            <h6>If you need more information about the connect attachement. Contact to administrator authority of the CHWG platform.</h6>
        </div>
    @else
    <div class="col-lg-12">
            <div class="card" style="min-height: 458px;">
                <div class="card-body">

                        <div class="text-center m-auto">
                            <img class="paypal-logo" src="{{ asset('front/square.png') }}">
                            <h1 class="my-1">Square Connect</h1>
                            <h5 class="font-weight-normal">Square was established to give every business owner an easier way to take credit cards. Whether you’re a small business or enterprise, square make accepting card payments as fast, painless, and secure as possible, with no extra fees, no long-term contracts, and no tricks. Just payment processing you can depend on so that you never miss a sale.</h5>
                            <form method="post" action="{{route('homeopath.square.connect')}}">
                                @csrf
                                <div class="form-group1">
                                    <input type="text" class="form-control my-1" name="app_id" value="{{\Auth::user()->square_app_id}}" placeholder="Application ID" required>
                                </div>
                                <div class="form-group1">
                                    <input type="text" class="form-control my-1" name="access_token" value="{{\Auth::user()->square_access_token}}" placeholder="Access Token" required>
                                </div>
                                <div class="form-group1">
                                    <input type="text" class="form-control my-1" name="location_id" value="{{\Auth::user()->square_location_id}}" placeholder="Location ID" required>
                                    <small style="clear: both;" class="text-left d-block">You are agree to the <a href="https://squareup.com/us/en/legal/general/ua" target="_blank">terms & conditions</a> after clicking on the "Connect my square account" button.</small>
                                </div>
                                <div class="form-group1">
                                    <button type="submit" class="btn btn-fluid btn-primary my-2" style="float: right;">Connect my Square account</button>
                                </div>
                            </form>
                            <div style="clear:both;text-align: left;"> 
                                <h4>Get application credentials</h4>
                                <h5>1. Open the <a href="https://developer.squareup.com/apps" target="_blank">Developer Dashboard</a> and click the plus symbol under "Applications" to create a new application.</h5>
                                <h5>2. Open the application and choose the <b>Credentials</b> page.</h5>
                                <h5>3. Switch from Sandbox to Production Mode.</h5>
                                <h5>4. Copy the <b>Application ID</b> and <b>Access Token</b>.</h5>
                                <h5>5. Choose the Locations page and copy the <b>Location ID</b>.</h5>
                                <h5>6. Paste the Applications ID, Location ID, and Access token above.</h5>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('homeopath.set.account') }}" method="POST">
                        @csrf
                        <div class="text-center m-auto">
                            <img class="paypal-logo" src="{{ asset('front/paypal.png') }}">
                            <h1 class="my-1">Connect to payapal</h1>
                            <h5 class="font-weight-normal">PayPal payments, also called mass payments, wll allow you to receive money in your connected email account easily and save. You just need to connect your PayPal account email address in order for Mass Payments for your account prior to sending your payments.<a href="https://www.paypal.com/us/webapps/mpp/ua/useragreement-full" target="_blank">See Terms of Use</a> or visit <a href="https://www.paypal.com/" target="_blank">Paypal Inc.</a> for more information.</h5>
                        </div>
                        <input type="email" name="paypal_connect" class="form-control" placeholder="Paypal email address" required="">
                        <small class="text-left">You are agree to the <a href="https://www.paypal.com/us/webapps/mpp/ua/useragreement-full" target="_blank">terms & conditions</a> after clicking on the "Connect my paypal account" button.</small><br>
                        <button class="btn btn-fluid btn-primary d-block pull-right">Connect my Paypal account</button>
                    </form>
                </div>
            </div>
        </div>


        

    @endif






</div>
<div class="row">
    <div class="col-sm-12">
        <div style="background:#38b7f447;padding: 15px;">
            <b>Note: Only a one-time integration is required when connecting your payments accounts. Follow the steps in the confirmation
email you receive from Paypal and or Stripe in order to verify the accounts.</b>
        </div>
    </div>
</div>

@endsection
