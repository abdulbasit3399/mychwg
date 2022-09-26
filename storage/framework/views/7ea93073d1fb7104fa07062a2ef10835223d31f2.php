<?php $__env->startSection('title','Appointment Management'); ?>

<?php $__env->startSection('heading','Appointment Management'); ?>

<?php $__env->startSection('content'); ?>



    <div class="card mt-1">

        <div class="card-content">

            <div class="card-body">

                    <div class="">

                        <a href="" class="text-primary">Appointments</a>

                    </div>



                <form method="GET" action="" class="mb-2">

                        <div class="row">

                            <div class="col-sm-2">

                                <small>Booking Created From</small>

                                <input type="text" class="form-control datepicker" name="from" readonly="" value="<?php echo e($req->from ?? ''); ?>">

                            </div>

                            <div class="col-sm-2">

                                <small>Booking Created To</small>

                                <input type="text" name="to" class="form-control datepicker" readonly="" value="<?php echo e($req->to ?? ''); ?>">

                            </div>

                            <div class="col-sm-3">

                                <small>Service</small>

                                <select class="form-control text-capitalize" name="service">

                                    <option value="">--------------</option>

                                    <?php $__currentLoopData = Auth::user()->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e(base64_encode($service->id)); ?>"

                                            <?php if(isset($req->service)): ?> <?php if($req->service == base64_encode($service->id)): ?> selected="" <?php endif; ?> <?php endif; ?>>

                                            <?php echo e($service->title); ?>


                                        </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>

                            </div>

                            <div class="col-sm-3">

                                <small>Patient</small>

                                <select class="form-control text-capitalize" name="patient">

                                    <option value="">--------------</option>



                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <option value="<?php echo e(base64_encode($user->id)); ?>"

                                                <?php if(isset($req->patient)): ?> <?php if($req->patient == base64_encode($user->id)): ?> selected="" <?php endif; ?> <?php endif; ?>>

                                                <?php echo e($user->name); ?>


                                            </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </select>

                            </div>



                            <div class="col-sm-2">

                                <small style="visibility:hidden;">-</small>

                                <button class="btn btn-primary btn-block"><i class="feather icon-filter"></i> Filter</button>

                            </div>



                        </div>

                    </form>



                    <hr class="mb-0">



                                    <div class="row">

                                        <div class="col-12">

                                            <div class="card">



                                                <div class="card-content">

                                                    <div class="table-responsive w-100">

                                                        <table class="table table-hover datatable">

                                                            <thead>

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

                                                            </thead>

                                                            <tbody>

                                                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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



                                                                            <td>



                        <?php if($item->status == 'completed' || $item->status == 'closed' || $item->status == 'cancelled'): ?>

                                                                                <?php if($item->status == 'completed'): ?>



                                                                                <a href="<?php echo e(route('prescription', $item->uuid)); ?>" target="_blank" class="btn btn-primary btn-sm">View Prescription</a>

                                                                                <?php endif; ?>

                                                                                <?php else: ?>

                                                                                   <form action="<?php echo e(route('homeopath.bookings.update.status')); ?>" id="appointment_status_change_form" method="get">

                                                                                    <input type="hidden" name="status" id="hidden_appointment_status" value="">

                                                                                    <input type="hidden" name="id" id="hidden_appointment_id" value="">

                                                                                    <input type="hidden" name="note" id="hidden_appointment_note" value="">



                                                                                     <select class="w-100 py-0 booking_status_change" data-href="#">

                                                                                        <option value="">Choose status:</option>

                                                                                        <option value="<?php echo e(Crypt::encrypt($item->id)); ?>" data-status="<?php echo e(base64_encode('closed')); ?>" >Closed</option>

                                                                                        <option value="<?php echo e(Crypt::encrypt($item->id)); ?>" data-status="<?php echo e(base64_encode('cancelled')); ?>">Cancelled</option>



                                                                                    </select>



                                                                                   </form>

                                                                                <?php endif; ?>







                                                                            </td>



                                                                            <td>

                    <?php if($item->status == 'completed' || $item->status == 'closed' || $item->status == 'cancelled'): ?>

                                                                                ------------------

                                                                                <?php else: ?>

                                                                                <button class="btn btn-sm btn-dark btn-block btn-complete" data-id="<?php echo e(Crypt::encrypt($item->id)); ?>">Mark Complete</button>



                                                                                 <form action="<?php echo e(route('service.zoom.meeting')); ?>" method="post">

                                                                                    <?php echo csrf_field(); ?>

                                                                                    <input type="hidden" name="service_id" value="<?php echo e($item->homeopath_service_id); ?>">

                                                                                    <input type="hidden" name="slot" value="<?php echo e(getBookingTime($item->time_slot)); ?>">

                                                                                    <input type="hidden" name="user_id" value="<?php echo e($item->user->id); ?>">

                                                                                    <button class="btn btn-sm  btn-block btn-success mt-1" type="submit">Start Meeting</button>





                                                                                </form>





                                                                                <?php endif; ?>

                                                                            </td>







                                                                            <td class="text-right">



                                                                                <a href="#"

                                                                                        class="btn-update-apt"

                                                                                        data-="<?php echo e(Crypt::encrypt($item->id)); ?>"

                                                                                        data-apt="<?php echo e($item->date); ?>, <?php echo e(getBookingTime($item->time_slot)); ?>"

                                                                                        data-illness="<?php echo e($item->illness ?? 'N/A'); ?>"

                                                                                        data-allergies="<?php echo e($item->allergies ?? 'N/A'); ?>"

                                                                                        data-concern="<?php echo e($item->concern ?? 'N/A'); ?>"

                                                                                        data-status="<?php echo e($item->status); ?>"

                                                                                        >

                                                                                            <i class="fas fa-eye fa-2x text-secondary"></i>

                                                                                    </a>





                                                                            </td>

                                                                        </tr>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

            </div>

        </div>

    </div>









<!--==================================================================-->

                        <!--MODAL SECTIONS-->

<!--==================================================================-->

<!-- Button trigger modal -->



<!-- Modal for ADD  -->

<div class="modal fade" id="modalUpdateApt">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Appointment Information</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <h4>

                    <strong class="text-warning">Appointment Date/Time: </strong>

                    <span id="apt"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Illness: </strong>

                    <span id="illness"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Allergies: </strong>

                    <span id="allergies"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Health Concern: </strong>

                    <span id="concern"></span>

                </h4>



                <h4 class="mt-5">

                    <strong class="text-warning">Appointment Status: <em class="text-success text-uppercase" id="status"></em></strong>

                </h4>





            </div>

        </div>

    </div>

</div>





<!-- modal for note to cancel -->







<!-- Modal -->

<div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Provide the reason for cancellation</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <textarea class="form-control" rows="3" id="note_textarea" placeholder="Write note..."></textarea>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary submit_note_btn" data-dismiss="modal">Skip</button>

        <button type="button" class="btn btn-primary submit_note_btn" id="submit_note_btn">Submit</button>

      </div>

    </div>

  </div>

</div>





<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script>



    $(document).on('click', '.btn-update-apt', function(){

        $modal = $('#modalUpdateApt');



        $('#apt').text($(this).data('apt'));

        $('#illness').text($(this).data('illness'));

        $('#allergies').text($(this).data('allergies'));

        $('#concern').text($(this).data('concern'));

        $('#status').text($(this).data('status'));





        $modal.modal('show');

    })









</script>

<script>

    $(document).on('click', '.btn-complete', function() {

        $('#booking_id').val($(this).data('id'));

        $('#markBookingComplete').modal('show');

    })

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/appointments/index.blade.php ENDPATH**/ ?>