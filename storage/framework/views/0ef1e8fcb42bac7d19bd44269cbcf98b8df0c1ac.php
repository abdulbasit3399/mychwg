<?php $__env->startSection('title','News Letter Email'); ?>
<?php $__env->startSection('heading','News Letter Email'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <form method="post" action="<?php echo e(route('newsletter.email.send')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 form-group">
                            <label>Send Newsletter</label>
                            <input type="file" name="mail_file" class="form-control" accept=".doc,.docx,.pdf,image/*">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary">Send to all</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($item->email??''); ?></td>
                                        
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/newsletter_email/list.blade.php ENDPATH**/ ?>