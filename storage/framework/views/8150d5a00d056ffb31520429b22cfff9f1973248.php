<div class="banner-top v2 text-center" style="height:600px; background-image:url('<?php echo e(asset('front/assets/frontend')); ?>/img/imgb.webp'); background-size:cover;">
<div class="inner">
<h1 class="heading" style="font-size:60px;font-weight:600;"><?php echo e($setting['about_bottom_section_heading'] ?? ''); ?></h1>
<p style="max-width:600px; margin:0 auto;"><?php echo e($setting['about_bottom_section_description'] ?? ''); ?>

    <br> <br>
    <?php echo e($setting['about_bottom_section_interested'] ?? ''); ?>

</p>
<br>
<a href="<?php echo e(route('contact.us')); ?>" class="btn btn-primary  v2-btn-blue">Contact Us</a>
</div>
</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/components/work_with_us.blade.php ENDPATH**/ ?>