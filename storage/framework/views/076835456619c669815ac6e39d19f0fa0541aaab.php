    <div class="container container-book-appointment mb-4" style="border:5px solid #58C763;">
      <div class="appointment-banner pt-3 pb-1 row" style="background-image:url('<?php echo e(asset($service->ServiceTheme->cover)); ?>')">

        <div class="col-lg-11 col-md-11 col-sm-11 col-11 offset-lg-1 pt-1" style="color: <?php echo e($service->ServiceTheme->color); ?>;">
          <h2>Book an <br>Appointment</h2>
          <p>Please select a service, and book an <br>available time-slot.</p>
          <p class="pt-3">Thank you!</p>
        </div>

      </div>

      <div class="row">
        
        <div class="col-lg-12">
          <div class="row px-4" >
            <input type="hidden" name="homeopath_id" value="<?php echo e($homeopath->id); ?>">
        <?php $__currentLoopData = $homeopath->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-lg-4 mb-3">
            <div class="inputGroup">
              <input id="service__<?php echo e($loop->iteration); ?>" class="input_service" name="input_service" data-duration="<?php echo e($item->duration); ?>" data-homeopath-id="<?php echo e($homeopath->id); ?>"  data-service_price="<?php echo e($item->price); ?>" value="<?php echo e($item->id); ?>" type="radio" <?php if($item->id == $service->id): ?> checked="" <?php endif; ?> />
              <label for="service__<?php echo e($loop->iteration); ?>">
                <h6 class="mb-4"><?php echo e($item->title); ?></h6>
                <span><?php echo e($item->duration); ?> minutes</span>
              </label>
            </div>
          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      </div>




        <?php echo csrf_field(); ?>
        <input type="hidden" name="service_id" value="" class="service_id" >
        <div class="row p-4">
          <div class="col-lg-12">
            <strong>Select Date & Time</strong>
          </div>
          <div class="col-lg-6 mt-2">
            <input type="hidden" name="date" class="input_date" required="">
            <span type="text" id="datep" class="date-pick"></span>
          </div>
          <div class="col-lg-6 mt-2">
            <div class="card card-time">
              <div class="card-body">
                <div class="row booking-time-slot">


                </div>

                <div class="search-slot-loader d-none">
                     <i class="fas fa-circle-notch fa-spin fa-5x"></i>
                </div>

              </div>
            </div>

          </div>

          <div class="col-lg-12 text-right mt-4 btn-detail-next d-none">
            <div class="nav nav-tabs float-right">
              <a class="nav-item nav-link btn btn-primary" id="nav-detail-tab" data-toggle="pill" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Next</a>
            </div>
          </div>


        </div>



        </div>
      </div>

      </div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/services/appointment-booking/slide_1.blade.php ENDPATH**/ ?>