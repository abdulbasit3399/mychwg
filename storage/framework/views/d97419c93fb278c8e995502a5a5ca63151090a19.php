<div class="slide-logo">
  <a href="<?php echo e(route('index')); ?>" target="_blank"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>"></a>
</div>
<div class="row mb-3">
  <div class="col-sm-12">
    <h2 class="wizard-heading">Let's set you up!</h2>
    <h5 class="wizard-primary-title">Profile Information</h5> 
    <strong>Interests</strong>
    <br>
    <p>Tags are keywords used in posts that allow for a more streamlined approach to your feed. Pick the tags you are interested in and posts related to these interests will show up on your feed!</p>
  </div>

  <div class="row mt-4">

    <div class="col-sm-12 col-lg-10">
      <div class="row ck-button">


        <?php $__currentLoopData = getLatestSocialTags(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
              <label>
                <input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"><span class="text-capitalize"><?php echo e($tag->title); ?></span>
              </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      </div>
    </div>


  </div>


</div>
<div class="btn-next-slide">
  <a class="nav-link" id="slide-7-tab" data-toggle="pill" href="#slide-7" role="tab" aria-controls="slide-7" aria-selected="false">Next <i class="fas fa-chevron-right"></i></a>
</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how-to-prompt/slide_7.blade.php ENDPATH**/ ?>