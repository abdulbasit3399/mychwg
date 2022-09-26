 

<?php $__env->startSection('title','Setting'); ?>

<?php $__env->startSection('heading','Settings Control'); ?>





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

                                <h4 class="card-title">General Section </h4>

                                <a class="font-weight-bold" href="<?php echo e(route('admin.setting.index')); ?>">(Back to Control panel)</a>

                            </div>

                            <div class="card-body">

                                <div class="row">



                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Favicon</label>

                                            <input type="file" class=" dropify dropify-event"  name="favicon" data-default-file="<?php echo e(asset($setting['favicon'] ?? '')); ?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Logo</label>

                                            <input type="file" class=" dropify dropify-event"  name="logo" data-default-file="<?php echo e(asset($setting['logo'] ?? '')); ?>">

                                        </div>

                                    </div>



                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Site Full Name</label>

                                            <input type="text" value="<?php echo e($setting['site_full_name'] ?? ''); ?>" name="site_full_name" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Pages Bottom Heading</label>

                                            <input type="text" value="<?php echo e($setting['pages_bottom_heading'] ?? ''); ?>" name="pages_bottom_heading" class="form-control">

                                        </div>

                                    </div>





                                </div>

                            </div>

                        </div>

                    </div>





                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header card-header-primary">

                                <h4 class="card-title">Footer Section</h4>

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Footer Description</label>

                                            <input type="text" value="<?php echo e($setting['footer_description'] ?? ''); ?>" name="footer_description" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Phone</label>

                                            <input type="text" value="<?php echo e($setting['phone'] ?? ''); ?>" name="phone" class="form-control">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Email</label>

                                            <input type="text" value="<?php echo e($setting['email'] ?? ''); ?>" name="email" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Fax</label>

                                            <input type="text" value="<?php echo e($setting['fax'] ?? ''); ?>" name="fax" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Address</label>

                                            <input type="text" value="<?php echo e($setting['address'] ?? ''); ?>" name="address" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Copyright</label>

                                            <input type="text" value="<?php echo e($setting['copyright'] ?? ''); ?>" name="copyright" class="form-control">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header card-header-primary">

                                <h4 class="card-title">Social Links</h4>

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Facebook</label>

                                            <input type="text" value="<?php echo e($setting['facebook'] ?? ''); ?>" name="facebook" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Instagram</label>

                                            <input type="text" value="<?php echo e($setting['instagram'] ?? ''); ?>" name="instagram" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Twitter</label>

                                            <input type="text" value="<?php echo e($setting['twitter'] ?? ''); ?>" name="twitter" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Linkedin</label>

                                            <input type="text" value="<?php echo e($setting['linkedin'] ?? ''); ?>" name="linkedin" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Dribble</label>

                                            <input type="text" value="<?php echo e($setting['dribble'] ?? ''); ?>" name="dribble" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Youtube</label>

                                            <input type="text" value="<?php echo e($setting['youtube'] ?? ''); ?>" name="youtube" class="form-control">

                                        </div>

                                    </div>



                                </div>

                            </div>

                        </div>

                    </div>





                    <div class="col-md-12">

                        <div class="card">

                            <div class="card-header card-header-primary">

                                <h4 class="card-title">Other Pages </h4>

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label class="bmd-label-floating">Login Page Subheading</label>

                                            <input type="text" value="<?php echo e($setting['login_page_subheading'] ?? ''); ?>" name="login_page_subheading" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>Inner Page Banner Image (Register/Login)</label>

                                            <input type="file" class=" dropify dropify-event" name="inner_page_banner_image" data-default-file="<?php echo e(asset($setting['inner_page_banner_image'] ?? '')); ?>">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>Other Inner Page Banner Image e.g. (About/Contact/Our Mission/Faqs)</label>

                                            <input type="file" class=" dropify dropify-event" name="other_inner_page_banner_image" data-default-file="<?php echo e(asset($setting['other_inner_page_banner_image'] ?? '')); ?>">

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




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/setting/pages/general.blade.php ENDPATH**/ ?>