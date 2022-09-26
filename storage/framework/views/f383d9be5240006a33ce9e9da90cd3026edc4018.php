<ul  class="list-group text-left shadow-sm border-top" style="max-height:100px;overflow: auto;">
    <?php $__empty_1 = true; $__currentLoopData = $homeopath; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>    
      <li class="list-group-item p-1 border-0 append-name"><?php echo e($item->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="list-group-item p-1 border-0">Sorry! No homeopath was founded.</li>
    <?php endif; ?>

</ul><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/load_homeopath.blade.php ENDPATH**/ ?>