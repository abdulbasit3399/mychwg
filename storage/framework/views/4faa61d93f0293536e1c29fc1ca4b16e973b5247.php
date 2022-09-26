
<?php $__env->startSection('title','Email Setting'); ?>
<?php $__env->startSection('heading','Email Settings'); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="card">

            <div class="card-header card-header-primary">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table p-0">
                            <thead>
                            <tr>
                                <th width="60%">Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Verify Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('verify_email'); ?>" class="btn btn-primary w-100 font-weight-bold">Verify Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Register Advocate Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('register_advocate'); ?>" class="btn btn-primary w-100 font-weight-bold">Register Advocate Email</a></th>
                            </tr>
                             <tr>
                                <th><h3 class="text-success font-weight-bold">Register User Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('register_user'); ?>" class="btn btn-primary w-100 font-weight-bold">Register User Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Register Homeopath Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('register_homeopath'); ?>" class="btn btn-primary w-100 font-weight-bold">Register Homeopath Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Advocate Booking Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('advocate_booking'); ?>" class="btn btn-primary w-100 font-weight-bold">Advocate Booking Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Invitation Send Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('invitation'); ?>" class="btn btn-primary w-100 font-weight-bold">Invitation Send Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Sub Admin Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('sub_admin_email'); ?>" class="btn btn-primary w-100 font-weight-bold">Sub Admin Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Booking Completed Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('book_completed'); ?>" class="btn btn-primary w-100 font-weight-bold">Booking Completed Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Booking Confirmation Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('book_confirmation'); ?>" class="btn btn-primary w-100 font-weight-bold">Booking Confirmation Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Zoom Meeting Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('zoom_meeting'); ?>" class="btn btn-primary w-100 font-weight-bold">Zoom Meeting Email</a></th>
                            </tr>
                            <tr>
                                <th><h3 class="text-success font-weight-bold">Service Booking Alert Email Settings</h3></th>

                                <th class="text-right"><a href="<?php echo e(route('admin.email.invitation')); ?>?email=<?php echo e('service_booking_alert'); ?>" class="btn btn-primary w-100 font-weight-bold">Service Booking Alert Email</a></th>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/email_setting/index.blade.php ENDPATH**/ ?>