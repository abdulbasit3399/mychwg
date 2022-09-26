<header>
    <div class="wrapper">
        <!--<div id="header_content" style="background:#dcf2fa url('<?php echo e(asset($setting['other_inner_page_banner_image'] ?? '')); ?>') no-repeat 50% center;background-size: cover;">-->
        <div id="header_content" style="background:#D9EEF2">
            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--PAGE BANNER-->



            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="inner2 text-white">
                        <h2 class="txt60 text-dark"><?php echo e($heading ?? ''); ?></h2>
                        <p class="text-dark"><?php echo e($description ?? ''); ?></p>
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
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/components/pages_banner.blade.php ENDPATH**/ ?>