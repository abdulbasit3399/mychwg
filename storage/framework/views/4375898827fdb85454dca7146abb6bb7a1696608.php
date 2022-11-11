
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner rounded">
    
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>" data-interval="5000">
          <img class="d-block slider-img-show w-100" src="<?php echo e(asset($item->image)); ?>" alt="First slide" style="object-fit:contain;">
          <div class="carousel-caption d-none d-md-block">
            <!--<a href="<?php echo e($item->url); ?>" target="_blank"><h2 class="ads-heading"><?php echo e($item->heading); ?></h2></a>-->
          </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><?php /**PATH C:\laragon\www\mychwg\resources\views/components/ads_banner.blade.php ENDPATH**/ ?>