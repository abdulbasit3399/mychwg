<div class="sidebar-profile-homeo">
    <img src="<?php echo e(asset($homeopath->HomeopathProfile->service_profile_img ?? '')); ?>" class="rect-profile-img" onerror="this.style.display=''">
    <h5 class="mt-3 font-weight-bold"><?php echo e($homeopath->name??''); ?></h5>
    <small class="text-primary"><?php echo e($homeopath->HomeopathProfile->designation??''); ?></small>

    <p class="mt-3 caption__homeo__short d-block">
        <?php echo e($homeopath->HomeopathProfile->caption); ?>

    </p>



    <div class="Badges-accolades mt-4">
        <h6 >Badges and accolades</h6>

            <div class="row" style="padding:0 11px;">
                <div class="col mb-5">
                  <div class=" " id="multiCollapseExample1">
                    <div class="v-box1 text-center mt-3 row" style="justify-content:start !important;">


                        <?php if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Badge")=='true'): ?>
                            <div class="main-accolade col-sm-4 mb-2 icon-border-radius">
                                <img src="<?php echo e(asset(badge($homeopath->badge ?? '' )['path'] ?? '')); ?>" title="<?php echo e(badge($homeopath->badge??'')['title']??''); ?>" class="w-100 h-100">
                            </div>
                        <?php endif; ?>



                       <?php if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Booking Milestone")=='true' && count(getHomeopathBookings($homeopath->id)) >= 5): ?>
                        <?php
                          $modulas = 0;
                          if((count(getHomeopathBookings($homeopath->id)) % 5) == 0)
                            $modulas = count(getHomeopathBookings($homeopath->id));
                          else
                            $modulas = count(getHomeopathBookings($homeopath->id)) - (count(getHomeopathBookings($homeopath->id)) % 5);

                        ?>
                            <div class="item2 ">
                                <div>
                                    <img src="<?php echo e(asset('uploads/badges/bookings_25.png')); ?>"class="profile-bowl " style="width:76px !important" ><br/>
                                    <span style="font-size:7px;font-weight: 700;color: black;">
                                    <?php echo e($modulas); ?> BOOKINGS
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Years")=='true'): ?>
                            <div class="col-sm-4 mb-2 icon-border-radius">
                                <div>
                                    <?php if($homeopath->HomeopathProfile->created_at->diffInMonths() >= 12): ?>
                                    <img src="<?php echo e(asset('uploads/badges/year_1.png')); ?>"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top" >
                                    <?php elseif($homeopath->HomeopathProfile->created_at->diffInMonths() > 0): ?>
                                    <span class="txt9" style="font-size:12px" >
                                        <?php echo e($homeopath->HomeopathProfile->created_at->diffForHumans()); ?> </span>
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('uploads/badges/grand_opening.png')); ?>"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(badgesInformation($homeopath->id)['posts'] >= 100): ?>
                        <div class="main-accolade col-sm-4 icon-border-radius toggled-badge ">
                            <div>
                                <img src="<?php echo e(asset('uploads/badges/posts_100.png')); ?>"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(badgesInformation($homeopath->id)['resources'] >= 5): ?>
                        <div class="main-accolade col-sm-4 icon-border-radius toggled-badge ">
                            <div>
                                <img src="<?php echo e(asset('uploads/badges/resources_5.png')); ?>"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                            </div>
                        </div>
                        <?php endif; ?>

                        


                    </div>
                  </div>
                </div>
              </div>


    </div>



    <h6 class="mt-5 pt-5">Focus</h6>
    <p style="width: 270px;word-wrap: break-word;">

        <?php $__currentLoopData = explodeString($homeopath->HomeopathProfile->specializations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $focus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge badge-secondary text-capitalize"><?php echo e($focus); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </p>


    <h6 class="mt-5">Location</h6>
    <p><?php echo e($homeopath->HomeopathProfile->location); ?></p>

    <h6 class="mt-5">Certifications</h6>
    <p><?php echo e($homeopath->HomeopathProfile->certifications_info); ?></p>
    


    <h6 class="mt-5">Affiliations</h6>
    <p><?php echo e($homeopath->HomeopathProfile->affiliations); ?></p>


    <h6 class="mt-5">Contact</h6>
    <p class="font-weight-bold">Tel: <a class="text-dark font-weight-normal" href="tel:<?php echo e($homeopath->phone ?? 'N/A'); ?>"><?php echo e($homeopath->phone ?? 'N/A'); ?></a></p>
    <p class="font-weight-bold">Email: <a class="text-dark font-weight-normal" href="mailto:<?php echo e($homeopath->email); ?>"><?php echo e($homeopath->email); ?></a></p>

</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/homeopath/includes/features_sidebar.blade.php ENDPATH**/ ?>