
<?php $__env->startSection('title','Setting'); ?>
<?php $__env->startSection('heading','Settings Control'); ?>

<?php $__env->startSection('css'); ?>
<style>
    h4
    {
        color: #24B263 !important;
        font-weight: bold !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="<?php echo e(route('admin.setting.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Toast Notifications</h4>
                                <a class="font-weight-bold" href="<?php echo e(route('admin.setting.index')); ?>">(Back to Control panel)</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
            
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Badges Toast</label>
                                            <input type="text" value="<?php echo e($setting['get-more-badges-toast'] ?? ''); ?>" name="get-more-badges-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">registered homeopaths Toast</label>
                                            <input type="text" value="<?php echo e($setting['register-homeopath-toast'] ?? ''); ?>" name="register-homeopath-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">resource materials Toast</label>
                                            <input type="text" value="<?php echo e($setting['resources-toast'] ?? ''); ?>" name="resources-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Uploading avatar for service Toast</label>
                                            <input type="text" value="<?php echo e($setting['services-upload-avatar-toast'] ?? ''); ?>" name="services-upload-avatar-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">clinic description Toast</label>
                                            <input type="text" value="<?php echo e($setting['client-description-toast'] ?? ''); ?>" name="client-description-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Feedback Toast</label>
                                            <input type="text" value="<?php echo e($setting['feedback-toast'] ?? ''); ?>" name="feedback-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Homeopath settings Toast</label>
                                            <input type="text" value="<?php echo e($setting['settings-toast'] ?? ''); ?>" name="settings-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ZOOM Account Toast</label>
                                            <input type="text" value="<?php echo e($setting['zoom-toast'] ?? ''); ?>" name="zoom-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Homeopath Service Toast</label>
                                            <input type="text" value="<?php echo e($setting['services-toast'] ?? ''); ?>" name="services-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Homeopath Calender Toast</label>
                                            <input type="text" value="<?php echo e($setting['calendar-toast'] ?? ''); ?>" name="calendar-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Finance Toast</label>
                                            <input type="text" value="<?php echo e($setting['finance-toast'] ?? ''); ?>" name="finance-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Social platform  Toast</label>
                                            <input type="text" value="<?php echo e($setting['social-network-toast'] ?? ''); ?>" name="social-network-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Dashboard Toast</label>
                                            <input type="text" value="<?php echo e($setting['dashboard-toast'] ?? ''); ?>" name="dashboard-toast" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banners Toast</label>
                                            <input type="text" value="<?php echo e($setting['themes-toast'] ?? ''); ?>" name="themes-toast" class="form-control">
                                        </div>
                                    </div>
                                    
                                    

                                    
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="btn-group pull-right mb-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/setting/pages/toastr.blade.php ENDPATH**/ ?>