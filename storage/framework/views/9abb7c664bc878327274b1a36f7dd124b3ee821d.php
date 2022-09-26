<div class="slide-logo">
  <a href="<?php echo e(route('index')); ?>" target="_blank"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>"></a>
</div>
<div class="row mb-3">
  <div class="col-sm-12">
    <h2 class="wizard-heading">Let's set you up!</h2>
    <h5 class="wizard-primary-title">Profile Information</h5> 
    <strong>Companies & Organizations</strong>
    <br>
    <p>Pick the companies & organizations you would like to follow...<br>
Following companies and organizations involved in health and Homeopathy is a great way to <br>see what they are up to and get involved in their activities.</p>
  </div>

  <div class="row mt-4">

    <div class="col-sm-12">
      <div class="row ck-button">

        <?php $__currentLoopData = getSocialHomeopathCompanies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
              <label>
                <input type="checkbox" name="companies[]" value="<?php echo e($item->id); ?>"><span class="text-capitalize"><?php echo e($item->name); ?></span>
              </label>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>


  </div>


</div>
<div class="btn-next-slide">
  <a class="nav-link" id="slide-9-tab" data-toggle="pill" href="#slide-9" role="tab" aria-controls="slide-9" aria-selected="false">Next <i class="fas fa-chevron-right"></i></a>
</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how-to-prompt/slide_9.blade.php ENDPATH**/ ?>