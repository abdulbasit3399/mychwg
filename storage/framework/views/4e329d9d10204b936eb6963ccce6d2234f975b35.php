
<?php $__env->startSection('title','Create FAQ'); ?>
<?php $__env->startSection('heading','Create FAQ'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form method="post" action="<?php echo e(route('admin.faq.save')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="font-weight-bold">Question:</label>
                                <textarea class="form-control" name="question" placeholder="What is your Question?"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Answer:</label>
                                <textarea class="form-control small-summernote" name="answer" placeholder="What is your Question?"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/faq/add.blade.php ENDPATH**/ ?>