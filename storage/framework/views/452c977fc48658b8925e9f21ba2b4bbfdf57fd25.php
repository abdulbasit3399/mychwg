<?php ($albums = Auth::user()->userSocialAlbums->sortByDesc('id')); ?>
<?php ($albums_count = count($albums)); ?>
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    

    <!-- The slideshow -->
    <div class="carousel-inner">
        <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($item->albumPhotos) >0): ?>
        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
            <img  src="<?php echo e(asset($item->albumPhotos[0]->image)); ?>"
                 class="media-album-popup w-100 cursor-pointer mb-1"
                 style="object-fit: cover;max-height: 270px;"
                 data-id="<?php echo e($item->id); ?>">
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php if($albums_count>1): ?>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    <?php endif; ?>

</div>

<script>
    var photo_count = '<?php echo e($albums_count); ?>';
    if(photo_count==0){
        $('.photo-aslbum .card').first().addClass('d-none')
    }
</script>






















<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/albums.blade.php ENDPATH**/ ?>