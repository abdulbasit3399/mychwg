








<div id="demo1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php if(count($photos)>1): ?>
        <ul class="carousel-indicators">
            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#demo1" data-slide-to="<?php echo e($key); ?>" class=" <?= ($key == 0) ? 'active' : '' ?>"></li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    <?php endif; ?>


    <!-- The slideshow -->
    <div class="carousel-inner">
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
                <img  src="<?php echo e(asset($item->image)); ?>"
                      class="w-100 cursor-pointer mb-1"
                      style="object-fit: cover;"
                      data-id="<?php echo e($item->id); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if(count($photos)>1): ?>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo1" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo1" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    <?php endif; ?>

</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/album.blade.php ENDPATH**/ ?>