
<?php $__env->startSection('title','Reported Users Management'); ?>
<?php $__env->startSection('heading','Reported Users Management'); ?>

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
                                        <th>Reported By</th>
                                        <th>Reported User</th>
                                        <th>Type</th>
                                        <th>Reason</th>
                                        <th>Submitted</th>
                                        <th>Report Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h6><?php echo e($item->reportedBy->name ?? 'N/A'); ?></h6>
                                            <a href="mailto:<?php echo e($item->reportedBy->email ?? 'N/A'); ?>"><?php echo e($item->reportedBy->email ?? 'N/A'); ?></a>
                                            <small class="text-success d-block"><?php echo e($item->reportedBy->role ?? 'N/A'); ?></small>
                                        </td>
                                        <td>
                                            <h6><?php echo e($item->reportedUser->name ?? 'N/A'); ?></h6>
                                            <a href="mailto:<?php echo e($item->reportedUser->email ?? 'N/A'); ?>"><?php echo e($item->reportedUser->email ?? 'N/A'); ?></a>
                                        </td>
                                        <td><?php echo e($item->type ?? 'N/A'); ?></td>
                                        <td><?php echo e($item->reason ?? 'N/A'); ?></td>
                                        <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                        <td><span class="badge badge-dark font-weight-bold status-td"><?php echo e($item->status); ?></span></td>
                                        <td class="text-right update-status-td">

                                            <?php if($item->status == 'closed'): ?>
                                                ---------------------
                                            <?php else: ?>
                                                <select class="w-100 update-status" data-id="<?php echo e(Crypt::encrypt($item->id)); ?>">
                                                    <option hidden="">Update report status</option>
                                                    <option value="block">Block the user</option>
                                                    <option value="cancelled">Cancell the report</option>
                                                </select>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>
    $(document).on('change', '.update-status', function() {
        $self = $(this);
        $id     = $(this).data('id');
        $status = $(this).val();

        $.ajax({
                method:'get',
                url:'<?php echo e(route('admin.reports.update.status')); ?>?id='+$id+'+&status='+$status,
                success:function (response){

                    toastr.success(response);
                    if($status == 'cancelled')
                    {
                        $self.closest('tr').remove();
                    }
                    else
                    {
                        $self.closest('tr').find('.status-td').text('Closed');
                        $self.closest('tr').find('.update-status-td').html('---------------------');
                    }

                    
                    
                }
            })


    })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/reports/reports.blade.php ENDPATH**/ ?>