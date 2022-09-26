<?php $__env->startSection('title','Services'); ?>

<?php $__env->startSection('heading','Services'); ?>





<?php $__env->startSection('css'); ?>

<style type="text/css">

    .btn

    {

          white-space: nowrap;

    }

    .documents__form .card

    {

        min-height: 330px;

    }

</style>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>





<div class="row mt-2">

        <div class="col-xl-12 col-sm-12">

            <div class="card">

                <h6 class="m-0"><span class="text-white bg-dark p-1">Service Details</span></h6>

                <div class="card-content">

                    <div class="card-body">

                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <h3 class="text-success font-weight-bold"><?php echo e($service->title); ?></h3>

                            </div>

                            <div class="float-right">

                                <p class="font-weight-bold mb-0">Created</p>

                                <span class="font-weight-bold text-success"><?php echo e($service->created_at->diffForHumans()); ?></span>

                            </div>

                        </div>





                        <hr class="my-2">



                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <p class="font-weight-bold mb-0">Type</p>

                                <span class="badge badge-success"><?php echo e($service->type); ?></span>

                            </div>

                            <div class="float-right">

                                <p class="font-weight-bold mb-0">Price</p>

                                <span class="badge badge-primary">CAD $<?php echo e(number_format($service->price, 2)); ?></span>

                            </div>

                        </div>





                        <hr class="my-2">



                        

                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <p class="font-weight-bold mb-0">Duration</p>

                                <span class="badge badge-dark"><?php echo e($service->duration); ?> Minutes</span>

                            </div>

                            <div class="float-right">

                                <p class="font-weight-bold mb-0">Status</p>

                                <span class="badge badge-primary"><?php echo e($service->status); ?></span>

                            </div>

                            <div class="float-right">

                                <strong>Meeting Via: 

                                    <?php

                                    $meetings=json_decode($service->meeting_handled_via);

                                    ?>

                                    <?php if($meetings): ?>

                                        <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <span class=" badge badge-success text-white">

                                                <?php echo e($meeting ?? "N/A"); ?>


                                            </span>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>

                                    

                                </strong>    

                            </div>

                            

                        </div>





                        <hr class="my-2">



                        

                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <?php if($service->status == 'closed'): ?>

                                    <a href="<?php echo e(route('homeopath.services.update.status', [ 'id' => Crypt::encrypt($service->id), 'status' => base64_encode('active') ])); ?>" class="btn btn-success">Active this Service</a>

                                <?php else: ?>

                                    <a href="<?php echo e(route('homeopath.services.update.status', [ 'id' => Crypt::encrypt($service->id), 'status' => base64_encode('closed') ])); ?>" class="btn btn-danger alert-confirm font-weight-bold">CLOSE THIS SERVICE</a>

                                <?php endif; ?>

                                

                            </div>

                            <div class="float-right">

                                <button data-toggle="modal" data-target="#modalUpdateService" class="btn btn-primary " title="Edit"><i class="fas fa-edit"></i></button>

                                <a href="<?php echo e(route('homeopath.services.delete', Crypt::encrypt($service->id))); ?>" class="btn btn-danger alert-confirm" title="Remove"><i class="fas fa-trash"></i></a>

                            </div>

                        </div>

                        

                    </div>

                </div>

            </div>

        </div>

</div>



<div class="text-center mb-3">

    <a href="<?php echo e(route('homeopath.services.book.appointment', Crypt::encrypt($service->id))); ?>" class="font-weight-bold border-0 btn bg-success text-white">+ Add a manual appointment</a>

</div>







<div class="row documents__form">

    <?php echo $__env->make('homeopath.services.forms.form_1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('homeopath.services.forms.form_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('homeopath.services.forms.form_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('homeopath.services.forms.form_4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    

</div>





    





<!--========================================================-->

                <!--MODAL FOR UPDATE SERVICE-->

<!--========================================================-->

<div class="modal fade" id="modalUpdateService" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">My Service</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form method="post" action="<?php echo e(route('homeopath.services.update')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="service_id" value="<?php echo e(Crypt::encrypt($service->id)); ?>">

                    <label>Service Title</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="text" class="form-control rounded-0" id="title" name="title" value="<?php echo e($service->title); ?>" required="">

                    </div>

                    <label>Service Duration</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="duration">

                            <?php for($i=30; $i< 181; $i+=30): ?>

                                <option value="<?php echo e($i); ?>" <?php if($service->duration == $i): ?> selected="" <?php endif; ?>><?php echo e($i); ?> Minutes</option> 

                            <?php endfor; ?>

                        </select>

                    </div>



                    <label>Price Rate (CAD)</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="price">

                            <?php for($i=5; $i< 500; $i+=5): ?>

                                <option value="<?php echo e($i); ?>" <?php if($service->price == $i): ?> selected="" <?php endif; ?>><?php echo e($i); ?></option> 

                            <?php endfor; ?>

                        </select>

                    </div>



                    <label>Service Thumbnail</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="file" class="dropify" id="thumbnail" name="thumbnail" data-default-file="<?php echo e(asset($service->thumbnail)); ?>">

                    </div>

                    

                    <label>Service Type</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="type">

                            <option value="<?php echo e($service->type); ?>" selected="" hidden=""><?php echo e(ucfirst($service->type)); ?></option>

                            <option value="featured">Featured</option>

                            <option value="popular">Popular</option>

                            <option value="new">New</option>

                            <option value="old">Old</option>

                            <option value="other">Other</option>

                        </select>

                    </div>

                    

                    <?php

                      $arr=json_decode($service->meeting_handled_via);

                    ?>

                    <label>Service Handled via</label>

                    <div class="input-group mb-2 mr-sm-2 mt-2 pr-3">

                        

                        <input type="checkbox" name="meeting_handled_via[]" value="Offline" class="meeting_handled_via_offline" <?php if(in_array('Offline',$arr??[])): ?> checked="" <?php endif; ?>>

                        <label>Offline</label>



                    </div>

                    <div class="input-group mb-2 mr-sm-2">

                

                        <input type="checkbox" name="meeting_handled_via[]" value="Online" class="meeting_handled_via_online" <?php if(in_array('Online',$arr??[])): ?> checked="" <?php endif; ?>>

                        <label>Online</label>



                    </div>



                    <label>Service Theme <small>(Select desired theme for booking)</small></label>

                    <div class="input-group mb-2 mr-sm-2">

                        <?php $__currentLoopData = serviceThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <label class="selectTheme" for="option-<?php echo e($loop->iteration); ?>" style="background-image:url('<?php echo e(asset($item->cover)); ?>')">

                               <input type="radio" name="service_theme_id" value="<?php echo e($item->id); ?>" id="option-<?php echo e($loop->iteration); ?>" required="" <?php if($service->ServiceTheme->id == $item->id): ?> checked="" <?php endif; ?>>

                           </label>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>



                    <label>Want to Display Additional Service Appointment Documents?</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="is_show_additional_doc">

                            <option value="<?php echo e($service->is_show_additional_doc); ?>" selected="" hidden=""><?php echo e($service->is_show_additional_doc); ?></option>

                            <option value="No">No</option>

                            <option value="Yes">Yes</option>

                        </select>

                    </div>



                        

                    <div class="text-right">

                        <button class="btn btn-dark" type="submit">Save</button>

                    </div>



                </form>

            </div>

        </div>

    </div>

</div>









<?php $__env->stopSection(); ?>



    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>





<?php $__env->startSection('js'); ?>

<script>

    $(document).on('click', '.btn-complete', function() {

        $('#booking_id').val($(this).data('id'));

        $('#markBookingComplete').modal('show');

    })

</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/services/detail.blade.php ENDPATH**/ ?>