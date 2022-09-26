<ul  class="list-group text-left shadow-sm">

    <li class="list-group-item p-1 text-info cursor-nothing">Members</li>

    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="list-group-item p-1 border-0 append-name">
        <a href="<?php echo e(route('social.connection.profile', [$item->user_name ?? '',$item->slug] )); ?>" target="_blank">
            <div class="media">
                <img class="profile-avatar-small" src="<?php echo e(asset($item->avatar)); ?>">
                <div class="media-body pl-2">
                    <h5 class="mt-0 mb-0"><?php echo e($item->name); ?></h5>
                    <small class="text-success font-weight-bold"><?php echo e($item->role); ?></small>
                </div>
            </div>
        </a>
        
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>


    <li class="list-group-item p-1 text-success cursor-nothing">Groups</li>

    <?php $__empty_1 = true; $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="list-group-item p-1 border-0 append-name">
            <a href="<?php echo e(route('social.group.detail', Crypt::encrypt($item->id))); ?>" target="_blank">
                <div class="media">
                    <div class="media-body pl-2">
                        <h5 class="mt-0 mb-0"><?php echo e($item->title); ?></h5>
                    </div>
                </div>
            </a>
            
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

</ul>


<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/load_username.blade.php ENDPATH**/ ?>