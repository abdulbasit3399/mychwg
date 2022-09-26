<a href="<?php echo e($req->url); ?>" target="_blank">
    <div class="card" style="background-color: #F0F2F5;border:1px solid #ccc;box-shadow: none;">
        <div class="card-body p-1">
            <div class="media">
                <?php if($meta['img'] != ''): ?>
                    <img class="mr-1" style="width: 100px;height: 100px; object-fit:cover;" src="<?php echo e($meta['img']); ?>" alt="<?php echo e($meta['title']); ?>">
                <?php endif; ?>
                <div class="media-body text-dark">
                    <h5 class="mt-0 font-weight-bold"><?php echo e($meta['title']); ?></h5>
                    <?php echo e($meta['description']); ?>

                </div>
            </div>
        </div>
    </div>
    
</a><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/ajax/link_preview.blade.php ENDPATH**/ ?>