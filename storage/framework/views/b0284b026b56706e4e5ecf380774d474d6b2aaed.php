
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa url('<?php echo e(asset($setting['inner_page_banner_image'] ?? '')); ?>') no-repeat 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--PAGE BANNER-->
            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="inner">
                        <h2>Login</h2>
                        <p><?php echo e($setting['login_page_subheading'] ?? ''); ?></p>
                        <p class="cmp-button-row non-mobile-only">
                        <div class="right-box">
                            <div class="screenshot"></div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--END HEADER-->



<section class="content mb-5" id="login">
    <div class="container custom-extra-top-style">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row justify-content-center mt-3">
                            <div class="col-xs-12 text-center">
                                <h3>Login to your Account</h3>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group has-feedback">
                                <input name="email" id="email" tabindex="1" class="form-control" placeholder="Email address*" type="email" required="" value="<?php echo e(old('email')); ?>">
                                <span class="fa fa-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input name="password" id="password" tabindex="2" class="form-control" placeholder="Password*" type="password" required="">
                                <span class="fa fa-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group text-center">
                                <input tabindex="3" class="shopist-iCheck" name="login_remember_me" id="login_remember_me" type="checkbox">
                                <label for="remember"> Remember Me</label>
                            </div>
                            <div class="form-group">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 text-center">
                                        <button type="submit" class="form-control btn btn-success">Login to my account</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="<?php echo e(route('password.request')); ?>" tabindex="5" class="forgot-password">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#modalRegistration" class="register-new-user">Create a new account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {
       $("html, body").animate({scrollTop: $('#login').offset().top }, 700);
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cvvc\resources\views/auth/login.blade.php ENDPATH**/ ?>