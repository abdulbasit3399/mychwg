
<?php $__env->startSection('title', $setting['terms_title'] ?? ''); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($setting['terms_keywords'] ?? ''); ?>">
    <meta name="description" content="<?php echo e($setting['terms_description'] ?? ''); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa 50% center;background-size: cover;">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--PAGE BANNER-->
            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="">
                        <h2 class="text-dark"><?php echo e($setting['terms_title'] ?? ''); ?></h2>
                        
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

<!--MAIN CONTENT SECTION-->
<section class="content">
    <div id="custom_single_page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 py-5">
                <p><?php echo $setting['terms_body'] ?? ''; ?></p>
                </div>
            </div>
        </div>
        <div class="banner-bottom  text-center">
            <div class="inner">
                <h2><?php echo e($setting['pages_bottom_heading'] ?? 'Join the CHWG Today'); ?></h2>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/terms.blade.php ENDPATH**/ ?>