<?php $__env->startSection('title','Email Setting'); ?>
<?php $__env->startSection('heading','Register User Email'); ?>
<?php $__env->startSection('css'); ?>
<style>
.bg-orange{
    background-color: orange;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $setting=$setting['register_user']??'';
        $setting=json_decode($setting);

    ?>

    <section>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="<?php echo e(route('admin.email.save')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="register_user" name="email_type">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <strong class="text-info">Caption of Email:</strong>
                                                <input type="text" value="<?php echo e($setting->hello ??''); ?>" name="hello" class="form-control w-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">

                                            <strong class="text-info">Subject of Email:</strong>
                                            <textarea type="text" name="subject" class="form-control small-summernote"  placeholder="write subject..."><?php echo e($setting->subject??''); ?>

                                            </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <strong class="text-info">Content of Email:</strong>
                                            <textarea type="text" name="desc" class="form-control small-summernote">
                                                <?php echo e($setting->desc??''); ?>

                                            </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <strong class="text-info">Signature of Email:</strong>
                                            <input type="hidden" name="set_img" value="<?php echo e($setting->image??''); ?>">
                                            <input type="file" name="image" class="form-control dropify"  data-default-file="<?php echo e(asset($setting->image??'')); ?>">
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <strong class="text-info">Thanks of Email:</strong>
                                            <input type="text" value="<?php echo e($setting->team??''); ?>" name="team" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-title bg-orange1 p-1">
                                    <h1 class="text-center text-white"><img src="<?php echo e(asset(\App\Models\Setting::where('key','logo')->first()->value ?? '')); ?>" style="width: 120px;" alt=""></h1>
                                </div>
                                <div class="card-body">
                                    <h4 id="hello"><?php echo e($setting->hello??''); ?></h4>
                                    <br>
                                    <h3 id=subject><?php echo $setting->subject??''; ?></h3>
                                    <p><span id="desc"><?php echo $setting->desc??''; ?> </span></p>
                                    <?php if($setting->image??''): ?>
                                    <img src="<?php echo e(asset($setting->image??'')); ?>" alt="no image"></img>
                                    <?php endif; ?>
                                    <h5 id="team"><?php echo e($setting->team??''); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('keyup','.form-control',function (){
            var name=$(this).attr('name')
            var val=$(this).val()
            if (name=='hello')
            {
                $('#hello').text(val)
            }
            if (name=='desc')
            {
                $('#desc').text(val)
            }
            if (name=='team')
            {
                $('#team').text(val)
            }
            if (name=='subject')
            {
                $('#subject').text(val)
            }
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/email_setting/user/register_user.blade.php ENDPATH**/ ?>