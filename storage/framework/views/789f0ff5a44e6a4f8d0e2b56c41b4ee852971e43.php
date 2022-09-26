
<?php $__env->startSection('title','Inquiries Management'); ?>
<?php $__env->startSection('heading','Inquiries Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatables p-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Submitted</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($inquiry->name ?? 'N/A'); ?></td>
                                        <td><?php echo e($inquiry->email ?? 'N/A'); ?></td>
                                        <td><?php echo e($inquiry->phone ?? 'N/A'); ?></td>
                                        <td><?php echo e($inquiry->message ?? 'N/A'); ?></td>
                                        <td><?php echo e($inquiry->created_at->diffForHumans()); ?></td>
                                        <td class="text-right">
                                            <?php if($inquiry->status == 'active'): ?>
                                                <a href="<?php echo e(route('admin.inquiry.update', $inquiry->id)); ?>" class="btn btn-primary">Close Inquiry</a>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Inquiry Closed</span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/inquiries/inquiries.blade.php ENDPATH**/ ?>