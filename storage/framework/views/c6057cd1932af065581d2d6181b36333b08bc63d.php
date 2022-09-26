<div class="tab-pane fade show active">
    <div class="text-center materia_logo">
        <img src="<?php echo e(asset('front/assets/materia_faction.png')); ?>">
        <p>Your health starts with you.</p>
      </div>
      <div class="row mb-3">
        <div class="col-lg-8 col-sm-12 offset-sm-2 bg-white rounded pb-4">
          <h2 class="wizard-heading my-4">Let's set you up!</h2>
          <h5 class="font-weight-bold">Before you get started, please specify your
            display name...</h5>

          <input type="text" value="<?php echo e(Auth::user()->user_name); ?>" name="user_name" class="form-control username-input" required="" placeholder="Charlesxavier381">

          <p class="alert alert-secondary rounded-0 my-4 font-weight-bold p-4">
            <i class="fas fa-info-circle"></i>
            Be advised that Materia Faction is a social platform that
            revolves around health & wellness. Therefore, to respect
            personal health information, you may choose a display
            name that grants you anonymity.
        </p>


        <div class="prompt-checkbox">
            <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label" for="invalidCheck2">
                    I understand that I am responsible about personal
                    health information I disclose a bout myself.
                  </label>
                </div>
              </div>

            <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                  <label class="form-check-label" for="invalidCheck3">
                    I have reviewed and accept the <a href="<?php echo e(route('terms')); ?>" target="_blank">Terms & Conditions</a> for using Materia Faction.
                  </label>
                </div>
              </div>

        </div>


        <div class="btn-next-slide">
            <button type="submit" class="nav-link border-0">Enter</button>
          </div>

        </div>



      </div>


</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how-to-prompt/components/advocates_prompt.blade.php ENDPATH**/ ?>