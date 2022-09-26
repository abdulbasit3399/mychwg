<?php $__env->startSection('title','Settings'); ?>

<?php $__env->startSection('heading','Settings'); ?>

<?php $__env->startSection('content'); ?>







<?php if(Auth::user()->state == 'Ontario'): ?>

    <div class="card mt-1 p-2">

        <?php if(Auth::user()->subscribed('default')): ?>

            <h4>CHWG Subscription</h4>

            <p>Currently, you have an active subscription plan. If you want to cancel your subscription, please click on the button below.</p>

            <a onclick="return confirm('Are you sure you want to cancel your subscription? IF YES press OK!')" href="<?php echo e(route('subscription.cancel')); ?>" class="btn btn-danger w-25">Cancel my Subscription</a>

        <?php endif; ?>

    </div>

<?php endif; ?>





<div class="card mt-1">

    <h6 class="m-0"><span class="text-white bg-dark p-1">Homeopath Photos</span></h6>



    <div class="card-body mt-2">

        <div class="row">



            <div class="col-sm-12">



                <form method="POST" action="<?php echo e(route('homeopath.settings.update.images')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="" class="image_id">

                    <div class="row main-item-images">

                        <?php $__empty_1 = true; $__currentLoopData = Auth::user()->HomeopathImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-6 mb-3 text-center">

                            <input type="file" name="image[]" class="dropify" data-id="<?php echo e($item->id); ?>" multiple data-default-file="<?php echo e(asset($item->image)); ?>" data-allowed-file-extensions="jpeg jpg png">

                            <span class="remove-image-box" data-image="<?php echo e($item->id); ?>">x</span>

                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <div class="col-xl-3 col-md-3 col-sm-3 col-6 mb-3">

                            <input type="file" name="image[]" required="" class="dropify" multiple data-default-file="" data-allowed-file-extensions="jpeg jpg png" required="">

                        </div>

                        <?php endif; ?>



                    </div>





                    <div class=" mb-3 text-right">

                        <input type="hidden" name="removeimage" id="removeimage">

                        <button class="btn btn-primary add-new-item-image" data-toggle="tooltip" data-placement="top" title="Add new photo">+ Add new image</button>

                        <strong>or</strong>

                        <button type="submit" name="action" value="images" class="btn btn-success font-weight-bold">Save Photos</button>

                    </div>

                </form>



            </div>



        </div>

    </div>

</div>



<div class="card">

    <h6 class="m-0"><span class="text-white bg-dark p-1">Profile Information</span></h6>



    <div class="card-body post-registration">

        <div class="row">

            <div class="col-sm-12">



                            <form class="form-horizontal" method="POST" action="<?php echo e(route('homeopath.complete.profile.update')); ?>">

                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="profile_id" value="<?php echo e(Crypt::encrypt(Auth::user()->HomeopathProfile->id ?? '')); ?>">

                                            <div class="row">

                                                <div class="col-sm-12">

                                                        <div class="controls">

                                                            <label>Designation</label>

                                                            <input type="text" name="designation" class="form-control"

                                                                value="<?php echo e(Auth::user()->HomeopathProfile->designation ?? ''); ?>" placeholder="Designation" required="">

                                                        </div>

                                                </div>



                                                <div class="col-sm-12">

                                                        <div class="controls">

                                                            <label>Caption</label>

                                                            <textarea rows="5" name="caption" class="form-control" style="height:150px" 

                                                                placeholder="Caption" required=""><?php echo e(Auth::user()->HomeopathProfile->caption ?? ''); ?></textarea>

                                                        </div>

                                                </div>

                                                <div class="col-sm-12 mb-2">

                                                            <label class="mb-1">Focus Tags</label>

                                                            <input type="text" name="specializations" id="form-tags-1" required="" value="<?php echo e(Auth::user()->HomeopathProfile->specializations ?? ''); ?>">

                                                </div>



                                                <div class="col-sm-6">

                                                        <div class="controls">

                                                            <label>Location</label>

                                                            <input type="text" name="location" id="point" class="form-control" placeholder="Location" required=""

                                                            value="<?php echo e(Auth::user()->HomeopathProfile->location ?? ''); ?>">

                                                        </div>

                                                            <input type="hidden" id="latitude" name="latitude" value="<?php echo e(Auth::user()->HomeopathProfile->latitude ?? ''); ?>">

                                                            <input type="hidden" id="longitude" name="longitude" value="<?php echo e(Auth::user()->HomeopathProfile->longitude ?? ''); ?>">

                                                    

                                                </div>



                                                <!--<div class="col-sm-6">-->

                                                <!--    <div class="form-group">-->

                                                <!--        <div class="controls">-->

                                                <!--            <label>Add Certifications</label>-->

                                                <!--            <input type="text" name="certifications" class="form-control" placeholder="Certifications"-->

                                                <!--                value="<?php echo e(Auth::user()->HomeopathProfile->certifications ?? ''); ?>"-->

                                                <!--             required="">-->

                                                <!--            <div class="help-block"></div></div>-->

                                                <!--    </div>-->

                                                <!--</div>-->



                                                <div class="col-sm-6">

                                                        <div class="controls">

                                                            <label>Affiliations</label>

                                                            <input type="text" name="affiliations" class="form-control" placeholder="Affiliations"

                                                            value="<?php echo e(Auth::user()->HomeopathProfile->affiliations ?? ''); ?>"

                                                             required="">

                                                        </div>

                                                </div>

                                                <div class="col-sm-12 text-right mt-2">

                                                <button type="submit" class="btn btn-success font-weight-bold">Save Changes</button>

                                                </div>

                                        </form>



            </div>

        </div>

    </div>

</div>



<div class="row">

    <div class="col-12">

        <div class="card">

            

            <h6 class="m-0"><span class="text-white bg-dark p-1">Badges Setting</span></h6>

            <div class="card-content">

           

                <div class="table-responsive mt-3">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Name</th>

                                <th>Value</th>

                                <th>Action</th>

                                

                            </tr>

                        </thead>

                        <tbody>

                           <tr>

                                <td>

                                   <span><b>Badge</b></span>

                               </td>

                               <td>

                                   <img src="<?php echo e(asset(badge(Auth::user()->badge ?? '' )['path'] ?? '')); ?>" title="<?php echo e(badge(Auth::user()->badge??'')['title']??''); ?>" class="" style="width: 70px;">

                               </td>

                               

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Badge")=='true'): ?> checked=""  <?php endif; ?> data-badge="Badge">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>



                           <tr>

                               

                               <td>

                                   <span><b>Booking Milestone</b></span>

                               </td>

                               <td>

                                  <img src="<?php echo e(asset('front/assets/icons/milestone.png')); ?>" style="width: 75px;">

                               </td>

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Booking Milestone")=='true'): ?> checked=""  <?php endif; ?>  data-badge="Booking Milestone">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>

                           <tr>

                               

                               <td>

                                   <span><b>Years</b></span>

                               </td>

                               <td>

                                <img src="<?php echo e(asset('front/assets/icons/years.png')); ?>" style="width: 75px;">

                               </td>

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Years")=='true'): ?> checked=""  <?php endif; ?> data-badge="Years">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>



                           <tr>

                               

                               <td>

                                   <span><b>Articals</b></span>

                               </td>

                               <td>

                                <img src="<?php echo e(asset('front/assets/icons/article.png')); ?>" style="width: 75px;">

                               </td>

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Articals")=='true'): ?> checked=""  <?php endif; ?> data-badge="Articals">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>

                           <tr>

                               

                               <td>

                                   <span><b>Events Hosted</b></span>

                               </td>

                               <td>

                                <img src="<?php echo e(asset('front/assets/icons/events_hosted.png')); ?>" style="width: 75px;">

                               </td>

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Events Hosted")=='true'): ?> checked=""  <?php endif; ?> data-badge="Events Hosted">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>

                           <tr>

                               

                               <td>

                                   <span><b>Events Attended </b></span>

                               </td>

                               <td>

                                <img src="<?php echo e(asset('front/assets/icons/events_attended.png')); ?>" style="width: 75px;">

                               </td>

                               <td>

                                   <div class="mb-4">

              

                                      <label class="custom-control teleport-switch">

                                        <span class="teleport-switch-control-description">Private</span>

                                        <input type="checkbox" class="teleport-switch-control-input" <?php if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Events Attended")=='true'): ?> checked=""  <?php endif; ?> data-badge="Events Attended">

                                        <span class="teleport-switch-control-indicator"></span>

                                        <span class="teleport-switch-control-description">Public</span>

                                      </label>

                                    </div>

                               </td>

                           </tr>

                            

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>







<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>



    $(document).on('change','.dropify',function(e){

        e.preventDefault();

        var id=$(this).data('id');

        if (id) {

            $('.image_id').val(id);

        }else{

            $('.image_id').val('');



        }

    })



$('.add-new-item-image').on('click', function(e) {

    e.preventDefault();

    $basket_length = $('.main-item-images input').length;

    if ($basket_length >= 20) {

        $(".add-new-item-image").hide();

    return;

}

$(this).closest('form').find('.main-item-images').append('<div class="col-xl-3 col-md-3 col-sm-3 col-6 mb-3 text-center"><input type="file" name="image[]" required class="dropify" multiple data-default-file=""  data-allowed-file-extensions="jpeg jpg png"><span class="remove-image-box">x</span></div>');

$('.dropify').dropify();

});

$(document).on('click', '.remove-image-box', function(e) {

e.preventDefault();

if (this.hasAttribute('data-image'))

{

$('#removeimage').val($('#removeimage').val()+""+$(this).data('image')+",");

}

$(this).closest('div').remove();

});

</script>







<script>

    $('.add-new-item-doc').on('click', function(e) {

        e.preventDefault();



        $(this).closest('form').find('.main-item-images').append('<div class="col-xl-3 col-md-3 col-sm-3 col-6 mb-3 text-center"><input type="file" name="image[]" required class="dropify" multiple data-default-file=""  data-allowed-file-extensions="doc pdf"><span class="remove-image-box">x</span></div>');

        $('.dropify').dropify();

        });



        $(document).on('click', '.remove-file-box', function(e) {

        e.preventDefault();

        if (this.hasAttribute('data-image'))

        {

        $('#removeFiles').val($('#removeFiles').val()+""+$(this).data('image')+",");

        }

        $(this).closest('div').remove();

        });





        $(document).on('click','.teleport-switch-control-input',function(){

          var checked=$(this).is(':checked');

          var badge=$(this).data('badge');

          var token=$('#csrf_token').val();



          var url="<?php echo e(route('homeopath.badge.status.change')); ?>";

          $.ajax({

            method:'post',

            url:url,

            data:{_token:token,badge:badge,status:checked},

            success:function(data)

            {

              if (data) 

              {

                toastr.success('Status has been changed successfully');

              }

            }

          })

        })



</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/settings/index.blade.php ENDPATH**/ ?>