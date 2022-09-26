<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/account.jpg) no-repeat 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--PAGE BANNER-->
            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="inner">
                        <h2><?php echo e(env('APP_NAME')); ?> User Registration</h2>
                        <p></p>
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
            <div class="col-md-12 text-center">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row justify-content-center mt-3">
                            <div class="col-xs-12 text-center">
                                <h3>Verify your Account</h3>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                                    <div class=" alert alert-warning text-dark ">
                                                 <?php $__env->slot('logo', null, []); ?> 
                                            <!-- <a href="/">
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.application-logo','data' => ['class' => 'w-20 h-20 fill-current text-gray-500']]); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-20 h-20 fill-current text-gray-500']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                            </a> -->
                                                 <?php $__env->endSlot(); ?>

                                        <div class="mb-4 text-sm text-gray-600">
                                            <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                                        </div>

                                        <?php if(session('status') == 'verification-link-sent'): ?>
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <div class="mt-4 flex items-center justify-between">
                                            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                                                <?php echo csrf_field(); ?>

                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Resend Verification Email</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>




































<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>