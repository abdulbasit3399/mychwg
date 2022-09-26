<?php $__env->startSection('title','Link Accounts'); ?>

<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading','Link Accounts'); ?>
<?php $__env->startSection('content'); ?>




<div class="row link_accounts">

    <?php if(Auth::user()->connect_type != ""): ?>
        <div class="col-sm-12 text-center">
            <h3>Your <strong class="text-success">"<?php echo e(Auth::user()->connect_type); ?>"</strong> account is linked with the CHWG Platform.</h3>
            <h6>If you need more information about the connect attachement. Contact to administrator authority of the CHWG platform.</h6>
        </div>
    <?php else: ?>

        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">

                    <form action="<?php echo e(route('homeopath.set.account')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="text-center m-auto">
                            <img class="paypal-logo" src="<?php echo e(asset('front/paypal.png')); ?>">
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

        <div class="col-lg-6 mb-3">
            <div class="card" style="min-height: 458px;">
                <div class="card-body">

                        <div class="text-center m-auto">
                            <img class="paypal-logo" src="<?php echo e(asset('front/stripe.png')); ?>">
                            <h1 class="my-1">Stripe Connect</h1>
                            <h5 class="font-weight-normal">Stripe Connect is the fastest and easiest way to integrate payments into your software platform or marketplace. Our set of programmable APIs and tools allows you to build and scale end-to-end payment experiences from instant onboarding to global payouts—all while having Stripe handle payments KYC. <br>For more information <a href="https://stripe.com/connect" target="_blank">See Terms of Use</a> or visit <a href="https://stripe.com/" target="_blank">Stripe Inc.</a></h5>
                        <a href="<?php echo e(route('homeopath.stripe.connect')); ?>" class="btn btn-fluid btn-primary my-2">Connect my Stripe account</a>
                        <small class="text-left d-block">You are agree to the <a href="https://stripe.com/legal" target="_blank">terms & conditions</a> after clicking on the "Connect my paypal account" button.</small>
                        </div>
                </div>
            </div>
        </div>

    <?php endif; ?>





    
</div>
<div class="row">
    <div class="col-sm-12">
        <div style="background:#38b7f447;padding: 15px;">
            <b>Note: Only a one-time integration is required when connecting your payments accounts. Follow the steps in the confirmation
email you receive from Paypal and or Stripe in order to verify the accounts.</b>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/accounts/index.blade.php ENDPATH**/ ?>