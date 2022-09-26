

<?php $__env->startSection('title','Update Service Theme'); ?>
<?php $__env->startSection('heading','Update Service Theme'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">



        <div class="col-sm-12">
            <div class="card">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form method="post" action="<?php echo e(route('admin.services.create')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                <label>Theme Title</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="e.g. Gray Theme" required="" value="<?php echo e($data->title??''); ?>">
                                </div>
                                <label>Pick Color</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="color" class="w-100 rounded-0" id="color" name="color" required="" value="<?php echo e($data->color??''); ?>">
                                </div>
                                <label>Cover</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="file" class=" dropify" id="fileChooser" name="cover"  data-default-file="<?php echo e(asset($data->cover)); ?>">
                                </div>
                                
                                
                                <div class="text-right">
                                    <button class="btn btn-dark" type="submit">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/services/edit.blade.php ENDPATH**/ ?>