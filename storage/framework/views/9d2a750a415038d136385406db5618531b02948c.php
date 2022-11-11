
<?php $__env->startSection('title', 'Homeopath Subscription'); ?>
<?php $__env->startSection('css'); ?>
    <style>

                #card-button  {
            float: left;
            display: block;
            background: #666EE8;
            color: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            border: 0;
            margin-top: 20px;
            font-size: 15px;
            font-weight: 400;
            width: 100%;
            height: 45px;
            line-height: 38px;
            outline: none;
            cursor: pointer;
        }

        #card-button:focus {
            background: #555ABF;
        }

        #card-button:active {
            background: #43458B;
        }

        height-page
        {
            height: 100%;
        }
        .row-eq-height {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display:         flex;
            height: 100vh;
        }
        .card-payment
        {
            box-shadow: 15px 0 30px 0 rgba(0,0,0,.38);
            border: 0px;
            border-radius: 0px !important;
        }
        /* Blue outline on focus */

        .group {
            background: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        label {
            position: relative;
            color: #8898AA;
            font-weight: 300;
            height: 40px;
            line-height: 40px;
            margin-left: 20px;
            display: flex;
            flex-direction: row;
        }

        .group label:not(:last-child) {
            border-bottom: 1px solid #F0F5FA;
        }

        label > span {
            width: 80px;
            text-align: right;
            margin-right: 20px;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #31325F;
            outline: none;
            flex: 1;
            padding-right: 10px;
            padding-left: 10px;
            padding-top: 10px;
            cursor: text;
            font-weight: 400;
        }

        .field::-webkit-input-placeholder { color: #CFD7E0; }
        .field::-moz-placeholder { color: #CFD7E0; }



        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }

        .success, .error {
            display: none;
            font-size: 13px;
        }

        .success.visible, .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
        }


    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</header>

<section style="background:#F9F9F9;" class="py-5 subscription_page">
    <div class="container py-3 bg-white">

        <div class="row">
            <div class="col-sm-12 text-right px-5">
                <a href="<?php echo e(route('index')); ?>">Return to website</a>
            </div>
            <div class="col-lg-7 col-sm-6 mt-4 px-5">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="font-weight-bold text-capitalize"><?php echo e(Auth::user()->role); ?> Package</h3>
                    </div>
                    
                </div>

                <?php if(Auth::user()->role == 'homeopath'): ?>

                    <h4 class="font-weight-bold mt-3">myClinic (Clinic Management Platform)</h4>
                    <small>Run your clinic on the fastest growing homeopath platform that ensures your business</small>

                <?php else: ?>

                    <h5 class="font-weight-bold">Advocacy Program (Social Platform) - <span class="text-info">$4.99 CAD/m</span></h5>
                    <small>Social health platform dedicated to a community driven by <br> holistic health solutions and alternative healthcare.</small>

                <?php endif; ?>


            </div>
            <div class="col-lg-5 col-sm-6 mt-4 px-5">
                <div class="card border-0 jumbotron p-1 payment_card">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Order Package & Plans</h5>

                        <div class="clearfix">
                            <div class="float-left mb-1">
                                <p class="text-info">(Yearly Subscription)</p>
                                <small>This package will automatically renew the following year on the date of purchase.</small>
                            </div>
                            <div class="float-right mb-1">
                                <?php if(Auth::user()->role == 'homeopath'): ?>
                                <a class="btn btn-sm btn-info text-white p-2" href="https://canadian-homeopathy-wellness-group.myhelcim.com/hosted/?token=cf24c3d8302daa874b8dc8&recurringPlan=b27af72a34d0ebeac1953b&amountHash=13a4c2269a09eccb20c4cf1c48f0ee62ec95bcd62aca59596d7f3ca44f53e883">Subscribe</a>
                                <?php elseif(Auth::user()->role == 'advocate'): ?>
                                <a class="btn btn-sm btn-info text-white p-2" href="https://canadian-homeopathy-wellness-group.myhelcim.com/hosted/?token=cf24c3d8302daa874b8dc8&recurringPlan=29c519b9cdcb626dd56db3&amountHash=13a4c2269a09eccb20c4cf1c48f0ee62ec95bcd62aca59596d7f3ca44f53e883">Subscribe</a>
                                <?php endif; ?>
                            </div>
                            <h4 class="font-weight-bold">$<?php echo e($yearly_plan_response->recurringPlan->amountRecurring); ?></h4>

                        </div>
                        <hr>
                        <div class="clearfix">
                            <div class="float-left mb-1">
                                <p class="text-info">(Monthly Subscription)</p>
                                <small>This package will automatically renew the following month on the date of purchase.</small>
                            </div>
                            <div class="float-right mb-1">
                                <?php if(Auth::user()->role == 'homeopath'): ?>
                                <a class="btn btn-sm btn-info text-white p-2" href="https://canadian-homeopathy-wellness-group.myhelcim.com/hosted/?token=cf24c3d8302daa874b8dc8&recurringPlan=684530c35e50de6bc9daf9&amountHash=13a4c2269a09eccb20c4cf1c48f0ee62ec95bcd62aca59596d7f3ca44f53e883">Subscribe</a>
                                <?php elseif(Auth::user()->role == 'advocate'): ?>
                                <a class="btn btn-sm btn-info text-white p-2" href="https://canadian-homeopathy-wellness-group.myhelcim.com/hosted/?token=cf24c3d8302daa874b8dc8&recurringPlan=071e6a9dea7d219bed8d96&amountHash=13a4c2269a09eccb20c4cf1c48f0ee62ec95bcd62aca59596d7f3ca44f53e883">Subscribe</a>
                                <?php endif; ?>
                            </div>
                            <h4 class="font-weight-bold">$<?php echo e($monthly_plan_response->recurringPlan->amountRecurring); ?></h4>

                        </div>

                        <small><strong>NOTE: </strong>All prices are in Canadian Dollar (CAD)</small>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mychwg\resources\views/front/subscription/index.blade.php ENDPATH**/ ?>