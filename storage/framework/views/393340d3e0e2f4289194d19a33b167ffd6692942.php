<?php $__env->startSection('title','Services'); ?>

<?php $__env->startSection('heading','Services'); ?>





<?php $__env->startSection('content'); ?>



<div class="card">

    <div class="card-header pb-1">

        <h3>My Service(s)</h3>

        <div class="btn-group">

            

            

            <button class="btn btn-primary btn-add-service float-right" data-action="<?php echo e(route('homeopath.services.create')); ?>">+  create my new service</button>

        </div>

    </div>

</div>



<div class="row">

    <?php $__currentLoopData = Auth::User()->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-4 col-md-4 col-sm-12 mb-4">

            <div class="card">

                <div class="card-content">

                    <div class="card-body">

                        <?php if($item->thumbnail): ?>

                            <img class="card-img service-thumbnail mb-1" src="<?php echo e(asset($item->thumbnail??'uploads/img/resource.PNG')); ?>">

                        <?php else: ?>

                            <img class="card-img service-thumbnail mb-1" src="<?php echo e(asset('uploads/img/service.PNG')); ?>">

                        <?php endif; ?>

                        

                        <h5 class="mt-1"><?php echo e($item->title); ?></h5>

                        <hr class="my-1">

                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <p class="font-weight-bold mb-0">Duration</p>

                                <span class="badge badge-dark"><?php echo e($item->duration); ?> Minutes</span>

                            </div>

                            <div class="float-right">

                                <p class="font-weight-bold mb-0">Status</p>

                                <span class="badge badge-primary"><?php echo e($item->status); ?></span>

                            </div>

                        </div>

                        <hr class="my-1">

                        <a href="<?php echo e(route('homeopath.services.detail', Crypt::encrypt($item->id))); ?>" class="btn btn-block btn-dark">View Service</a>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

    

<!-- Button trigger modal -->





<!-- interval setup Modal -->

<div class="modal fade" id="serviceIntervalSetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

            <form action="<?php echo e(route('homeopath.settings.service.time')); ?>" method="post">



                <div class="modal-content">

                  <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Select Time</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>

                  </div>

                  <div class="modal-body">

                    

                            <?php echo csrf_field(); ?>

                             <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">

                    

                            <div class="form-group">

                                <select class="select2 form-control" name="set_time">

                                    <option value="">Select One</option>



                                    <?php for($i=5; $i<=120 ; $i+=5): ?>

                                    <option <?php if(Auth::user()->HomeopathProfile->service_time_interval==$i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>

                                    <?php endfor; ?>

                                    

                                </select>

                            </div>

                            

                  </div>

                  <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Save</button>

                  </div>

                </div>

            </form>



  </div>

</div>















<!-- Modal for ADD/UPDATE color -->

<div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">My Service</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body" style="max-height: 500px; overflow: auto;">

                <form method="post" action="" enctype="multipart/form-data"id="new_homeopath_service_form">

                    <?php echo csrf_field(); ?>

                    <label>Service Title</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="e.g. Initial Consultation" required="">

                    </div>

                    <label>Service Duration</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="duration">

                            <?php for($i=30; $i< 181; $i+=30): ?>

                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Minutes</option> 

                            <?php endfor; ?>

                        </select>

                    </div>



                    <label>Price Rate (CAD)</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="price">

                            <?php for($i=5; $i< 500; $i+=5): ?>

                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option> 

                            <?php endfor; ?>

                        </select>

                    </div>



                    <label>Service Thumbnail</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="file" class="dropify" id="thumbnail" name="thumbnail" required="">

                    </div>

                    

                    <label>Service Type</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="type">

                            <option value="featured">Featured</option>

                            <option value="popular">Popular</option>

                            <option value="new">New</option>

                            <option value="old">Old</option>

                            <option value="other">Other</option>

                        </select>

                    </div>





                    <label>Service Handled via</label>

                    <div class="input-group mb-2 mr-sm-2 mt-2 pr-3">

                        

                        <input type="checkbox" name="meeting_handled_via[]" value="Offline" class="meeting_handled_via_offline">

                        <label>Offline</label>



                    </div>

                    <div class="input-group mb-2 mr-sm-2">

                

                        <input type="checkbox" name="meeting_handled_via[]" value="Online" class="meeting_handled_via_online">

                        <label>Online</label>



                    </div>





                    <label>Service Theme <small>(Select desired theme for booking)</small></label>

                    <div class="input-group mb-2 mr-sm-2">

                        <?php $__currentLoopData = serviceThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <label class="selectTheme" for="option-<?php echo e($loop->iteration); ?>" style="background-image:url('<?php echo e(asset($item->cover)); ?>')">

                               <input type="radio" name="service_theme_id" value="<?php echo e($item->id); ?>" id="option-<?php echo e($loop->iteration); ?>" required="">

                           </label>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>





                    <label>Want to Display Additional Service Appointment Documents?</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="is_show_additional_doc">

                            <option value="No">No</option>

                            <option value="Yes">Yes</option>

                        </select>

                    </div>

                        

                    <div class="text-right">

                        <button class="btn btn-dark" type="button" id="new_homeopath_service_save_btn">Save</button>

                    </div>



                </form>

            </div>

        </div>

    </div>

</div>



<?php $__env->stopSection(); ?>







<?php $__env->startSection('js'); ?>

<script>

        $(document).on('click', '.btn-add-service', function(){

            $modal = $('#modalAddService');

            $modal.find('form').attr('action', $(this).data('action'));

            $('#title').val('');



            $modal.modal('show');

        })



        $('#new_homeopath_service_save_btn').on('click',function(){

            if ($('.meeting_handled_via_online').is(':checked') || $('.meeting_handled_via_offline').is(':checked'))

             {

                $('#new_homeopath_service_form').submit();

             }else{

                toastr.success('Please select Your service is online or offline');

             }

        })



      

        

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/services/index.blade.php ENDPATH**/ ?>