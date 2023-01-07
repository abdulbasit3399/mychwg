
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('heading','Dashboard'); ?>
<?php $__env->startSection('css'); ?>
<style>
    .zoom-icon
    {
        background-color: #2174FF;
        color: #fff;
        padding: 16px;
        font-size: 30px;
        margin-right: 20px;
    }
    .btn-learn-more
    {
        background-color: #F6F7F9;
        border: 2px solid #D6D7DB;
        text-align: center;
        padding: 5px;
        font-weight: bold;
        color: #000;
    }
    .h5-heading
    {
        color: #B1B3B9;
        font-weight: bold;
    }

    .btn-attach,
    .btn-attach:hover
    {
        background-color: #4267B2;
        color: #fff;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 3px;
    }

    .bg-animated
    {
      animation: changeBackgroundColor 3s infinite;
      color: #000 !important;
    }

    @keyframes  changeBackgroundColor
    {
      0% {
        background-color: #388AF4;
      }
      25% {
        background-color: #646FF1;
      }
      50% {
        background-color: #388AF4;
      }

      75% {
        background-color: #646FF1;
      }

      100% {
        background-color: #388AF4;
      }
    }


</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="col-xl-12 col-lg-12 bookings-section p-0">

<div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0  color-primary-dark-green">CAD <?php echo e($income ?? 0); ?></h2>
                                        <p>Total Revenue</p>
                                    </div>
                                    <div class="avatar bg-tertiary-light-blue p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fas fa-dollar color-primary-dark-green font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-success"><?php echo e(count($active_appointments)); ?></h2>
                                        <p>Active Appointments</p>
                                    </div>
                                    <div class="avatar bg-primary-light-gray p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-server text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-danger"><?php echo e($total_appointments ?? 0); ?></h2>
                                        <p>Total Appointments</p>
                                    </div>
                                    <div class="avatar bg-primary-light-pink p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-list text-danger font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card bg-animated">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-white"><?php echo e($today_appointments ?? 0); ?></h2>
                                        <p class="text-white font-weight-bold">Today Appointments</p>
                                    </div>
                                    <div class="avatar bg-rgba-dark p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-list font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header d-flex align-items-start pb-0">

                    <h2 class="  mb-0 ">Latest appointments</h2>
                <div class="table-responsive">
                 <table class="table table-hover ">
                     <tr>
                         <th>Sr. </th>
                         <th width="15%">Apt. Date</th>
                         <th>Patient</th>
                         <th>Services</th>
                         <th>Status</th>
                         <th></th>
                         <th></th>
                         <th></th>
                     </tr>
                     <?php $__empty_1 = true; $__currentLoopData = $active_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <tr>
                             <th><?php echo e($loop->iteration); ?></th>
                             <th>
                                 <h4 class="text-secondary font-weight-bold m-0"><?php echo e($item->date); ?></h4>

                                 <h5 class="m-0"><?php echo e(getBookingTime($item->time_slot).' - '.getcompletedTime($item->time_slot)); ?> </h5>
                             </th>
                             <th>
                                 <?php echo e($item->user->name ?? ''); ?>

                                 <?php if($item->user): ?>
                                     <a class="d-block text-primary" href="mailto:<?php echo e($item->user->email); ?>">
                                         <?php echo e($item->user->email); ?>

                                     </a>
                                 <?php endif; ?>
                             </th>
                             <td><h5 class="text-secondary m-0 p-0"><?php echo e($item->HomeopathService->title ?? ''); ?></h5></td>

                             <td>
                                 <?php if($item->status == 'active'): ?>
                                     <span class="badge badge-success">ACTIVE</span>
                                 <?php elseif($item->status == 'pending'): ?>
                                     <span class="badge badge-primary">PENDING</span>
                                 <?php elseif($item->status == 'completed'): ?>
                                     <span class="badge text-dark-gray">COMPLETED</span>
                                 <?php elseif($item->status == 'cancelled'): ?>
                                     <span class="badge badge-danger text-uppercase"><?php echo e($item->status); ?></span>
                                 <?php else: ?>
                                     <span class="badge badge-secondary text-uppercase"><?php echo e($item->status); ?></span>

                                 <?php endif; ?>
                             </td>
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                         <tr>
                             <th colspan="5" class="text-center">No any appointment found</th>
                         </tr>
                     <?php endif; ?>
                 </table>
                </div>


            </div>
        </div>
    </div>

                        <div class="col-lg-12 p-0">
                        <form method="post" action="<?php echo e(route('link.zoom')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card">

                                <div class="" style="position:absolute;right: 0;padding: 10px;">
                                    <?php if(Auth::user()->zoom_access_token == ""): ?>
                                        <h5 class="font-weight-bold text-danger">Inactive</h5>
                                    <?php else: ?>
                                        <h5 class="font-weight-bold text-success">Active</h5>
                                    <?php endif; ?>
                                </div>

                                <div class="card-body">
                                    <div class="media">
                                        <i class="fas fa-video zoom-icon"></i>
                                      <div class="media-body">
                                        <h3 class="mt-0 font-weight-bold">Zoom</h3>
                                        <h5 ><span class="text-muted">By</span> <a href="https://zoom.us/" target="_blank">Zoom.us</a></h5>
                                        <a href="https://zoom.us/" target="_blank" class="btn-learn-more btn-block mt-1">Visit to learn more</a>
                                      </div>
                                    </div>
                                    <div class="email">
                                        <div class="form-group w-100">
                                            <label class="mb-1 mt-1">Connect Account</label>
                                            <input type="email" name="email" required="" autocomplete="off" class="form-control" value="<?php echo e(Auth::user()->zoom_email ?? Auth::user()->email); ?>">
                                        </div>
                                    </div>
                                    <div class="permissions mt-2">
                                        <h5>By connecting your zoom account you can...</h5>
                                        <ul>
                                            <li>Set up virtual services</li>
                                            <li>Conduct virtual meet-ups</li>
                                        </ul>
                                    </div>

                                    <?php if(Auth::user()->zoom_access_token == ""): ?>

                                        
                                        <h6 class="bg-rgba-info p-1 m-0" style="font-weight: 700;">NOTE: Only a one-time integration is required when connecting your Zoom account. Follow the steps in the confirmation email you receive from Zoom in order to verify the attachment.</h6>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h6 class="h5-heading">By clicking on the "Attach my account" button you agree to the <a target="_blank" href="https://explore.zoom.us/en/terms/">terms and conditions</a> of Zoom.us</h6>
                                        <hr class="mt-0">
                                        <button type="submit" class=" btn float-right btn-attach">Attach my account</button>
                                        <small class="text-center text-muted " style="padding-top: 5px;">Zoom will send confirmation email at your email address to verify your attachement.</small>

                                    <?php else: ?>
                                        <div class="jumbotron bg-rgba-warning text-center">
                                            
                                            <h2 class="text-success mt-1 font-weight-bold">Your account is linked with Zoom</h2>
                                            <?php if($is_zoom_active == true): ?>
                                                    <span><strong class="badge badge-success">Zoom account is activated <i class="fas fa-check"></i></strong></span><br>
                                                <?php else: ?>
                                                    <span><strong class="badge badge-danger">Zoom email not confirmed yet <i class="fas fa-times"></i></strong></span><br>
                                                <?php endif; ?>
                                            <small>For more info about linked accounts visit the <a href="">Zoom.us</a> now.</small>
                                            <hr>
                                            <h4>

                                                <span>Zoom email address: <strong class="text-success"><?php echo e(Auth::user()->zoom_email); ?></strong></span><br>
                                                <span>Zoom ID: <strong class="badge badge-info"><?php echo e(Auth::user()->zoom_access_token); ?></strong></span><br>


                                            </h4>
                                        </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </form>
                     </div>
</div>



<div class="col-md-12 col-12 p-0 mb-5">
    <?php echo $__env->make('components.ads_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>



        <!--=====================================================-->
                       <!-- order detail MODAL -->
        <!--=====================================================-->

            <div class="modal fade order_detail_modal pr-0" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header p-2">
                      <div class="modal-title">
                          <h5 class="m-0 p-0 font-weight-bold">Order Detail</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " id="order_detail_modal_body">
                    </div>
                  </div>
                </div>
              </div>

        <!--=====================================================-->
                       <!-- END order detail MODAL -->
        <!--=====================================================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script type="">
        $(document).on('click','.detail_order_btn',function(e){
            e.preventDefault();
            var url=$(this).attr('href');

            $.ajax({
                method:'get',
                url:url,
                success:function(data)
                {
                    $('#order_detail_modal_body').html(data)
                    $('.order_detail_modal').modal('show');
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mychwg\resources\views/homeopath/dashboard.blade.php ENDPATH**/ ?>