<?php if(isset($timetable->daySlots) && count($timetable->daySlots) > 0): ?>



  <?php $__currentLoopData = $timetable->daySlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>





    <?php for($i = strtotime($item->from); $i<= strtotime($item->to); $i = strtotime($interval, $i)): ?>



   

        <?php if($i < strtotime('-'.$service->duration." minutes", strtotime($item->to))): ?>



          <div class="col-sm-4">

            

            <div class="timeInput <?php if(in_array(convertToTime($i), $bookings)): ?> disabled-radio  <?php endif; ?> ">

              <input id="slot__<?php echo e($loop->iteration); ?>_<?php echo e($i); ?>" name="time_slot" type="radio" value="<?php echo e(convertToTime($i)); ?>" data-minutes="<?php echo e(convertToMinutes($i)); ?>" class="required-entry"/>

              <label for="slot__<?php echo e($loop->iteration); ?>_<?php echo e($i); ?>">

                <span><?php echo e(convertToTime($i)); ?></span>

              </label>

            </div>

          </div>

        <?php endif; ?>  



    <?php endfor; ?>







  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php else: ?>

  <h5 class="alert alert-danger text-center m-auto"><i class="fas fa-exclamation-triangle fa-1x"></i><br>The practitioner is closed on this day.</h5>

<?php endif; ?>



<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/ajax/front/services/booking_time_slots.blade.php ENDPATH**/ ?>