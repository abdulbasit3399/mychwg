<div class="slide-logo">
  <a href="<?php echo e(route('index')); ?>" target="_blank"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>"></a>
</div>
<div class="row mb-3">
  <div class="col-sm-12">
    <h2 class="wizard-heading">Let's set you up!</h2>
    <h5 class="wizard-primary-title">Profile Information</h5> 
    <br>
    <p>Pick a photo for your profile! Visuals help a community associate with one another, so don't be shy. You can always choose one of our pre-set avatars if you would like!</p>
  </div>

  <div class="col-sm-4 offset-sm-4 text-center mt-4">
    <h5 class="wizard-primary-title">Profile Picture:</h5> 
    <input type="file" name="avatar" class="form-control dropify" data-default-file="<?php echo e(asset(Auth::User()->avatar ?? '')); ?>">
  </div>


</div>
<div class="btn-next-slide">
  <a class="nav-link" id="slide-6-tab" data-toggle="pill" href="#slide-6" role="tab" aria-controls="slide-6" aria-selected="false">Next <i class="fas fa-chevron-right"></i></a>
</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how-to-prompt/slide_6.blade.php ENDPATH**/ ?>