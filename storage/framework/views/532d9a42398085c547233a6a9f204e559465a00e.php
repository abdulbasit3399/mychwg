
<?php $__env->startSection('title', 'IHWG for Homeopath'); ?>

<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/vancouver.jpg) no-repeat 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
</header>
<!--END HEADER-->
<!--MAIN CONTENT SECTION-->
<section class="content">
  <?php
    $slot=json_decode($booking->time_slot)
  ?>                                                                                

  <div class="container container-book-appointment mb-4" style="border: 5px solid;">

    <div class="appointment-banner  pt-3 pb-1" style="background-image:url('<?php echo e(asset($service->ServiceTheme->cover)); ?>')">

        <strong class="float-right pr-4" style="color: <?php echo e($service->ServiceTheme->color ?? '#000'); ?>;">4 of 4</strong>
        <div class="col-lg-11 offset-lg-1 pt-1" style="color: <?php echo e($service->ServiceTheme->color ?? '#000'); ?>;">
            <h2 class="pt-4">Thank you!</h2>
            <p>Thank you for your cooperation.<br>I look forward to helping you.</p>
            <p>Farewell!</p>
        </div>

    </div>


    <div class="row mb-4">
        <div class="col-lg-10 offset-lg-1">
          <div class="row px-4">



      <div class="col-sm-12 mt-3">
          <strong>Customer Receipt</strong>
          <small class="d-block font-weight-bold text-secondary">Your booking is now confirmed!</small>

        <table class="table table-borderless table-receipt mt-4">

          <tbody>
            <tr>
              <th class="text-secondary">Patient name</th>
              <th class="text-right"><?php echo e(Auth::User()->name ?? 'N/A'); ?></th>
            </tr>
            <tr>
              <th class="text-secondary">Service</th>
              <th class="text-right"><?php echo e($service->title); ?></th>
            </tr>
            <tr>
              <th class="text-secondary">Date</th>
              <th class="text-right"><?php echo e(date('H:ia l, F jS', strtotime($booking->date.' '.$slot[0]))); ?></th>
            </tr>
            <tr>
              <th>
                <strong class="d-block">Price</strong>
                <span class="text-secondary d-block">Taxes</span>
                <!-- <span class="text-secondary"><?php echo e(setting()['services_discount']); ?>% Senior Discount</span> -->
              </th>
           
              <th class="text-right">
                <strong class="d-block">CAD $<?php echo e(number_format(calculateServicePriceTax($service->price)['service_price'], 2)); ?></strong>
                <strong class="d-block"><b>CAD </b>$<?php echo e(number_format(calculateServicePriceTax($service->price)['tax'], 2)); ?> </strong>
              </th>
            </tr>
            <tr>
              <th class="text-secondary">Total</th>
              <th class="text-right">CAD $<b><?php echo e(number_format(calculateServicePriceTax($service->price)['total_price'], 2)); ?> </b></th>
            </tr>

          </tbody>
        </table>

      </div>

      <div class="col-lg-12 text-right">
        <button class="btn btn-checkout text-dark px-4" onclick="window.print()">Print</button>
        <a href="<?php echo e(route('redirect.dashboard')); ?>" class="link-return">Return to Dashboard > </a>
      </div>

    </div>



  </div>

</div>

</div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/services/book_receipt.blade.php ENDPATH**/ ?>