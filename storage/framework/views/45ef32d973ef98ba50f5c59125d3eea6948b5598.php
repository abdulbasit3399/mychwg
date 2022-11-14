<a class="float-right btn-view-all" data-toggle="modal" data-target="#viewAllServices">View all ></a>
<h4>Featured Services</h4>

<div class="row text-center mt-4">

    <?php $__currentLoopData = $homeopath->HomeopathServices->where('type', 'featured'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->iteration<5): ?>
          <div class="col-sm-4 mb-4">
              <div class="position-relative mb-3">
                  
                        <?php if($service->thumbnail): ?>
                            <img class="" src="<?php echo e(asset($service->thumbnail)); ?>">
                        <?php else: ?>
                            <img class="" src="<?php echo e(asset('uploads/img/service.PNG')); ?>">
                        <?php endif; ?>
                  <p><?php echo e($service->title); ?></p>
              </div>
              <?php if(Auth::user()): ?>
                <?php if(Auth::user()->role != 'homeopath'): ?>
                  <a
                      data-service_id="<?php echo e(Crypt::encryptString($service->id)); ?>"
                      class="btn-book book_btn">
                      Book
                  </a>
                <?php else: ?>

                <?php endif; ?>
              <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>" class="btn-book btn-success">Login to Book</a>
              <?php endif; ?>
          </div>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<!-- Modal Services -->
<div class="modal fade" id="viewAllServices" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header p-2">
          <h5 class="modal-title" id="exampleModalLongTitle">Services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="row text-center profile-services">
                      <?php $__currentLoopData = $homeopath->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-sm-3 mb-4">
                              <div class="position-relative mb-4">
                                  <?php if($service->thumbnail): ?>
                                      <img class="" src="<?php echo e(asset($service->thumbnail)); ?>">
                                  <?php else: ?>
                                      <img class="" src="<?php echo e(asset('uploads/img/service.PNG')); ?>">
                                  <?php endif; ?>
                                  <p><?php echo e($service->title); ?></p>
                              </div>
                              <?php if(Auth::user()): ?>
                                <?php if(Auth::user()->role != 'homeopath'): ?>
                                  <a
                                      data-service_id="<?php echo e(Crypt::encryptString($service->id)); ?>"
                                      class="btn-book book_btn">
                                      Book
                                  </a>
                                <?php endif; ?>
                              <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn-book btn-success">Login to Book</a>
                              <?php endif; ?>
                          </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
        </div>
      </div>
    </div>
  </div>
<?php /**PATH C:\laragon\www\mychwg\resources\views/front/homeopath/includes/services.blade.php ENDPATH**/ ?>