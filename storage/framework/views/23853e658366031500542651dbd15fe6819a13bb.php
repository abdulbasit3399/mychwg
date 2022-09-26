<div class="row connections-section">
    <div class="col-lg-12">
        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body">
                <h3 class="p-0 m-0 font-weight-bold">Connection(s)</h3>
            </div>
        </div>
        <div class="row">


            <?php $__currentLoopData = Auth::user()->userFollowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3 connections-card">
                    <div class="card">
                        <div class="card-content">
                            
                            <div class="card-body text-center p-1">
                                <img src="<?php echo e(asset($follower->avatar)); ?>" alt="img placeholder">
                                <h4 class="mt-1 font-weight-bold"><a href="<?php echo e(route('social.connection.profile', $follower->user_name)); ?>" target="_blank"><?php echo e($follower->name); ?></a></h4>
                                <h6 class="text-success"><?php echo e($follower->role); ?></h6>
                                <button class="btn gradient-light-primary btn-block mt-1 font-weight-bold btn-unfollow" data-page="connection" data-name="<?php echo e($follower->user_name); ?>" data-id="<?php echo e(Crypt::encrypt($follower->id)); ?>">Unfollow</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/connections.blade.php ENDPATH**/ ?>