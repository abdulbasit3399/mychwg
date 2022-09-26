        <div class="container container-book-appointment mb-4" style="border:5px solid #58C763;">

        <div class="appointment-banner  pt-3 pb-1" style="background-image:url('<?php echo e(asset($service->ServiceTheme->cover)); ?>')">

          <strong class="float-right pr-4" style="color: <?php echo e($service->ServiceTheme->color ?? '#000'); ?>;">2 of 4</strong>
          <div class="col-lg-11 offset-lg-1 pt-1" style="color: <?php echo e($service->ServiceTheme->color ?? '#000'); ?>;">
            <h2>Provide your<br> Health information</h2>
            <p>To better serve you, please fill-out the appropriate<br>information in the following documents.</p>
            <p class="pt-3">Thank you!</p>
          </div>

        </div>

        <div class="row mb-4">

        
        <div class="col-lg-12">
          <div class="row px-4">



          <div class="col-lg-12 mb-3">
             <strong>Please download the following form that relate to you:</strong>
             
              <?php if($service->adult_service_document != null): ?>
                <p class="mt-3 adult-form-download-heading"><?php echo e($service->service_document_heading ?? ''); ?></p>
                <a href="<?php echo e(asset($service->adult_service_document??'')); ?>" 
                   class="text-underlined download__form adult-form-download-btn" 
                   download="">
                     Download
                </a>
              <?php endif; ?>
              
              <?php if($service->child_service_document != null): ?>
                <p class="mt-3 child-form-download-heading"><?php echo e($service->service_document_inner_heading ?? ''); ?></p>
                <a href="<?php echo e(asset($service->child_service_document??'')); ?>" 
                   class="text-underlined download__form child-form-download-btn" 
                   download="">
                    Download
                </a>
              <?php endif; ?>
              

              <?php if($service->service_document_3_path != null): ?>
                <hr>
                <p class="mt-3 child-form-download-heading"><?php echo e($service->service_document_3_heading ?? ''); ?></p>
                <a href="<?php echo e(asset($service->service_document_3_path??'')); ?>" 
                   class="text-underlined download__form child-form-download-btn" 
                   download="">
                    Download
                </a>
              <?php endif; ?>
              
              <?php if($service->service_document_4_path != null): ?>
                <p class="mt-3 child-form-download-heading"><?php echo e($service->service_document_4_heading ?? ''); ?></p>
                <a href="<?php echo e(asset($service->service_document_4_path??'')); ?>" 
                   class="text-underlined download__form child-form-download-btn" 
                   download="">
                    Download
                </a>
              <?php endif; ?>
                


              
              <p class="mt-3 col-lg-8 p-0">By continuing the process, the patient understands that it is their responsibility to provide the practitioner with a completed health in-take form prior to the start of the consultation. The form must be completed as accurately and honestly as possible to best serve the patient's health needs and concerns.</p>
              <p>Please send the completed form(s) to <a href="mailto:<?php echo e($homeopath->email ?? 'info@chwg.com'); ?>" class="text-underlined"><?php echo e($homeopath->email ?? 'info@chwg.com'); ?></a></p>
          </div>


            <div class="col-lg-12 mb-4">
            <strong>2.Please Select Meeting Handel Via?</strong>
            </div>
            <?php
              $arr=json_decode($service->meeting_handled_via);
            ?>
            
           <?php if(in_array('Online',$arr) && in_array('Offline',$arr)): ?>
              

                <div class="col-lg-3 mb-3">

                  <div class="inputGroup" onclick="checkboxMetting('Offline')">
                    <input id="meeting_handled_via_offline" class="meeting_handled_via_checkbox" name="meeting_handled_via" value="Offline" type="radio" />
                    <label for="meeting_handled_via_offline">
                      <span>Offline</span>
                    </label>
                  </div>
                </div>



                <div class="col-lg-3 mb-3">
                  
                  <div class="inputGroup" onclick="checkboxMetting('Online')">
                    <input id="meeting_handled_via_online" class="meeting_handled_via_checkbox" name="meeting_handled_via" value="Online" type="radio"  checked="false" />
                    <label for="meeting_handled_via_online">
                      <span>Online</span>
                    </label>
                  </div>
                </div>
              

             


               
               <?php else: ?>
                 

                <?php if(in_array('Offline',$arr) && !in_array('Online',$arr)): ?>

                  <div class="col-lg-3 mb-3">

                    <div class="inputGroup">
                      <input id="meeting_handled_via_offline" class="" name="meeting_handled_via" value="Offline" data-document="<?php echo e(asset($homeopath->HomeopathProfile->service_document_inner)); ?>" type="radio" checked=""/>
                      <label for="">
                        <span>Offline</span>
                      </label>
                    </div>
                  </div>
                 <?php endif; ?>

                 <?php if(in_array('Online',$arr) && !in_array('Offline',$arr)): ?>
                  <div class="col-lg-3 mb-3">
                    
                    <div class="inputGroup">
                      <input id="meeting_handled_via_online" class="" name="meeting_handled_via" value="Online" type="radio" data-document="<?php echo e(asset($homeopath->HomeopathProfile->service_document)); ?>" checked="" />
                      <label for="">
                        <span>Online</span>
                      </label>
                    </div>
                  </div>
                <?php endif; ?>

             <?php endif; ?>




          <div class="col-lg-12 text-right mt-4 active show ">
            <div class="nav nav-tabs float-right">
              <a class="nav-item nav-link btn btn-primary continue_btn" id="nav-payment-tab" data-toggle="pill" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Continue</a>
            </div>
          </div>


        </div>
      </div></div></div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/services/appointment-booking/slide_2.blade.php ENDPATH**/ ?>