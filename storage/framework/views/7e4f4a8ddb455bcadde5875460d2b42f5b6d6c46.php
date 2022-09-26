
<?php $__env->startSection('title','Badge Request Management'); ?>
<?php $__env->startSection('heading','Badge Request Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0">
                                <thead>
                                    <tr>
                                        <th>Requested By</th>
                                        <th>Type</th>
                                        <th>Badge</th>
                                        <th>Description</th>
                                        <th>Attachement</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h6><?php echo e($item->user->name ?? 'N/A'); ?></h6>
                                            <a href="mailto:<?php echo e($item->user->email ?? 'N/A'); ?>"><?php echo e($item->user->email ?? 'N/A'); ?></a>
                                        </td>
                                        <td>

                                            <?php if($item->user->role == 'homeopath'): ?>
                                                <span class="badge badge-success text-uppercase"><?php echo e($item->user->role); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-info text-uppercase"><?php echo e($item->user->role); ?></span>
                                            <?php endif; ?>
                                            
                                        </td>
                                        <td class="text-center">
                                            <img src="<?php echo e(asset($item->badge->path)); ?>" style="width:45px;">

                                            <h6 class="text-warning"><?php echo e($item->badge->title); ?></h6>
                                        </td>
                                        <td>
                                            <h6><?php echo e(Str::limit($item->description,25)?? 'N/A'); ?></h6>
                                        
                                        </td>
                                        <td>
                                            <?php if($item->attachement): ?>
                                            <a href="<?php echo e(asset($item->attachement)); ?>" download="">view</a>
                                            <?php else: ?>
                                            <h2>-----------</h2>
                                            <?php endif; ?>

                                        </td>
                                        
                                       
                                        <td>
                                            <?php if($item->status=='active'): ?>
                                            <span class="badge font-weight-bold status-td badge-success"><?php echo e($item->status); ?></span>
                                            <?php elseif($item->status=='cancelled'): ?>
                                            <span class="badge font-weight-bold status-td badge-danger"><?php echo e($item->status); ?></span>
                                            <?php else: ?>
                                            <a href="#" class="status-btn"  data-toggle="modal" data-target="#updateBadgeStatusModal" data-id="<?php echo e(Crypt::encrypt($item->id)); ?>" data-user-id="<?php echo e(Crypt::encrypt($item->user_id)); ?>">
                                                <span class="badge font-weight-bold status-td badge-dark"><?php echo e($item->status); ?></span>
                                            </a> 
                                            <?php endif; ?>
                                            
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- status  Modal -->
<div class="modal fade" id="updateBadgeStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('admin.badge.requests.status')); ?>" method="post" id="badgeStatusForm">
            <?php echo csrf_field(); ?>
            <select class="form-control dropdown-list select-status mb-2" name="status">
                <option value="active">Accept</option>
                <option value="cancelled">Reject</option>
            </select>
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="user_id" id="user_id" value="">

            <textarea class="form-control" name="reason" id="reason" rows="3"></textarea>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-status-btn">Save changes</button>
      </div>
    </div>
  </div>
</div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>
    $(document).ready(function(){
        $('#reason').hide();
    })
    $(document).on('click','.status-btn',function() {
        var id =$(this).data('id');
        var user_id =$(this).data('user-id');

        $('#id').val(id)
        $('#user_id').val(user_id)

    })

    $(document).on('change','.select-status',function() {
        var val =$(this).val();
        if(val=='cancelled')
        {
           $('#reason').show(); 
        }else{
            $('#reason').hide();
        }
       
    })
    $(document).on('click','.save-status-btn',function() {
        $('#badgeStatusForm').submit()
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/badges/badge_requests.blade.php ENDPATH**/ ?>