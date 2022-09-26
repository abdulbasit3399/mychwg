<div class="slide-logo">
  <a href="<?php echo e(route('index')); ?>" target="_blank"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>"></a>
</div>
<div class="row mb-3">
  <div class="col-sm-12">
    <h2 class="wizard-heading">Let's set you up!</h2>
    <h5 class="wizard-primary-title">Social</h5> 
    <strong>Connect with...</strong>
    <br>
    <p>Connect with your friends.</p>
  </div>

  <div class="row mt-4">

    <div class="col-sm-12">
      <div class="row ck-button">
          <?php $__currentLoopData = getSocialFriends(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
              <div class="col-sm-4">
                <label>
                  <input type="checkbox" name="friends[]" value="<?php echo e($item->id); ?>"><span class="text-capitalize"><?php echo e($item->name); ?></span>
                </label>
              </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>


  </div>


</div>
<div class="btn-next-slide">
  <a class="nav-link" id="slide-10-tab" data-toggle="pill" href="#slide-10" role="tab" aria-controls="slide-10" aria-selected="false">Next <i class="fas fa-chevron-right"></i></a>
</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how-to-prompt/slide_10.blade.php ENDPATH**/ ?>