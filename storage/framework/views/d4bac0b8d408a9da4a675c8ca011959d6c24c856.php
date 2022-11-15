
<?php $__env->startSection('title','admin Dashbaord'); ?>
<?php $__env->startSection('heading','Profile Info'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('ijaboCrop/ijaboCropTool.min.css')); ?>">
 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- users edit start -->
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">

                <div class="">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <form method="post" action="<?php echo e(route('admin.update.profile')); ?>" enctype="multipart/form-data" id="profile-form" class="cmxform">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="file" name="image" id="image" class="form-control dropify" data-default-file="<?php echo e(asset(Auth::User()->avatar)); ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="name" value="<?php echo e(Auth::User()->name); ?>" required
                                                data-validation-required-message="This name field is required">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="email"
                                                name="email" value="<?php echo e(Auth::User()->email); ?>" required
                                                data-validation-required-message="This email field is required">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit"
                                        class="btn btn-relief-primary ">Save
                                        Changes</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- users edit ends -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo e(asset('ijaboCrop/ijaboCropTool.min.js')); ?>"></script>

<script>
    $('#image').ijaboCropTool({
        preview : '.image-previewer',
        setRatio:1,
        allowedExtensions: ['jpg', 'jpeg','png'],
        buttonsText:['CROP','QUIT'],
        buttonsColor:['#30bf7d','#ee5155', -15],

        processUrl:'<?php echo e(route("admin.crop")); ?>',
        withCSRF:['_token','<?php echo e(csrf_token()); ?>'],

        onSuccess:function(message, element, status){
            //alert('Successful');
            window.location.reload();
        },
        onError:function(message, element, status){
        alert('Failed to crop image');
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mychwg\resources\views/admin/profile.blade.php ENDPATH**/ ?>