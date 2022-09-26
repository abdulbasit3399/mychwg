
<?php $__env->startSection('title','Event Management'); ?>
<?php $__env->startSection('heading','Event Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12 events-management">
        <div class="card pl-2 py-1">
                <h2 class=" mb-0 font-weight-bold text-success"><?php echo e($item->title); ?></h2>
          </div>

          <div class="card">
                              <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-hover">
                                      <tbody>
                                        <h2 class="font-weight-bold text-info">Basic Details</h2>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Category:</h3></th>
                                          <td><h3><?php echo e($item->category); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Type:</h3></th>
                                          <td><h3><?php echo e($item->type); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Venue:</h3></th>
                                          <td><h3><?php echo e($item->venue ?? 'N/A'); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Location:</h3></th>
                                          <td><h3><?php echo e($item->location ?? 'N/A'); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Hosts:</h3></th>
                                          <td><h3><?php echo e($item->hosts ?? 'N/A'); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Vendors:</h3></th>
                                          <td><h3><?php echo e($item->vendors ?? 'N/A'); ?></h3></td>
                                        </tr>
                                        <tr>
                                          <th><h3 class="font-weight-bold">Status:</h3></th>
                                          <td><h3 class="text-warning"><?php echo e($item->status); ?></h3></td>
                                        </tr>


                                      </tbody>
                                    </table>



                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo e(asset($item->thumbnail)); ?>" class="w-100">
                                <h6 class="mt-2"><strong>DESCRIPITON:</strong> <?php echo e($item->description); ?></h6>
                            </div>








                        </div>
                  </div>
          </div>

            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                  <tbody>
                    <h2 class="font-weight-bold text-info">Event Timing</h2>
                    <tr>
                      <th><h4 class="font-weight-bold">#</h4></th>
                      <th><h4 class="font-weight-bold">Date</h4></th>
                      <th><h4 class="font-weight-bold">Time</h4></th>
                      <th><h4 class="font-weight-bold float-right">Create Zoom Meeting</h4></th>
                    </tr>

                    <?php $__currentLoopData = $item->eventTimings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th><h4 class="font-weight-bold"><?php echo e($loop->iteration); ?></h4></th>
                      <td><h4><?php echo e($timing->date); ?></h4></td>
                      <td><h4><?php echo e($timing->time); ?></h4></td>
                      <td>
                          <form method="post" action="<?php echo e(route('zoom')); ?>">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" value="<?php echo e($item->id); ?>" name="event_id">
                              <input type="hidden" value="<?php echo e($timing->id); ?>" name="event_time_id">
                              <button type="submit"  class="btn btn-success float-right">Start Zoom Meeting</button>
                          </form>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                  <tbody>
                        <h2 class="font-weight-bold text-info float-left">Event Joining Requests</h2>
                    <tr>
                      <th><h4 class="font-weight-bold">Event Date/Time</h4></th>
                      <th><h4 class="font-weight-bold">Requested User</h4></th>
                      <th><h4 class="font-weight-bold">Requested</h4></th>
                      <th><h4 class="font-weight-bold">Status</h4></th>
                      <th><h4 class="font-weight-bold">Action</h4></th>
                    </tr>

                    <?php $__currentLoopData = $item->eventTimings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php $__currentLoopData = $timing->eventRequests->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><h4><?php echo e($timing->date); ?></h4><h6><?php echo e($timing->time); ?></h6></td>
                          <td>
                            <h6 class="font-weight-bold"><?php echo e($request->user->name); ?></h6>
                            <a href="mailto:<?php echo e($request->user->email); ?>"><?php echo e($request->user->email); ?></a>
                          </td>
                          <td><?php echo e($request->created_at->diffForHumans()); ?></td>
                          <td><span class="badge badge-warning font-weight-bold text-uppercase status-span"><?php echo e($request->status); ?></span></td>
                          <td class="action-td">



                            <?php if($request->status == 'pending'): ?>
                                <select class="update-request-status" data-id="<?php echo e(Crypt::encrypt($request->id)); ?>">
                                    <option hidden="">Change Status</option>
                                    <option value="active">Accept</option>
                                    <option value="rejected">Reject</option>
                                </select>
                            <?php else: ?>
                                  --------------------
                            <?php endif; ?>


                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-body">

                        <div class="row">
                          <div class="col-sm-6">

                            <?php if($item->status != 'closed'): ?>
                                <a href="<?php echo e(route('advocate.events.close', Crypt::encrypt($item->id))); ?>" class="btn btn-success font-weight-bold"><i class="fas fa-check"></i> Close This Event</a>
                            <?php endif; ?>


                          </div>
                          <div class="col-sm-6 text-right">
                            <a href="<?php echo e(route('advocate.events.remove', Crypt::encrypt($item->id))); ?>" class="btn btn-danger alert-confirm font-weight-bold"><i class="fas fa-trash"></i> Delete Event</a>

                                <a href="<?php echo e(route('advocate.events.edit', Crypt::encrypt($item->id))); ?>" class="btn btn-info font-weight-bold"><i class="fas fa-edit"></i> Update Event</a>
                          </div>
                        </div>

              </div>
            </div>






    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

  <script>
    $(document).on('change', '.update-request-status', function() {

      $self = $(this);
      $id      = $(this).data('id');
      $status  = $(this).val();


          $.ajax({
            method:'get',
            url:"<?php echo e(route('advocate.events.request.status')); ?>",
            data: {id: $id , status: $status},
            success:function (response){
              toastr.success(response == 'active' ? 'Request has been accepted' : 'Request has been rejected');
              $self.closest('tr').find('.status-span').text(response);
              $self.closest('tr').find('.action-td').html('--------------------');

            }
        })



    })
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.advocate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/advocate/events/show.blade.php ENDPATH**/ ?>