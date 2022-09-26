<div class="row">

    <div class="col-sm-12">

        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card">

            <div class="card-body">

                <h3 class="p-0 m-0 font-weight-bold">Group(s)</h3>

            </div>

        </div>

    </div>

    





    <?php $__empty_1 = true; $__currentLoopData = Auth::user()->userSocialGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>



        <div class="col-sm-6 group-card">

            <div class="card p-1">

                <div class="card-header d-flex align-items-start pb-2 pt-2">



                    <div class="avatar bg-rgba-primary p-50 m-0">

                        <div class="avatar-content">

                            <img src="<?php echo e(asset($group->avatar)); ?>" class="group-avatar">

                        </div>

                    </div>

                        <h3 class="text-bold-700 mb-0"><a href="<?php echo e(route('social.group.detail', Crypt::encrypt($group->id))); ?>" target="_blank"><?php echo e($group->title); ?></a></h3>

                </div>

                <a class="btn gradient-light-primary font-weight-bold btn-unfollow-group text-white" data-group-id="group-<?php echo e($group->id); ?>" data-id="<?php echo e(Crypt::encrypt($group->id)); ?>">Unfollow</a>

            </div>

        </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <div class="text-center m-auto">

            <h6 class="alert alert-danger">You have not joined any groups yet. </h6>

        </div>



    <?php endif; ?>





</div>





<div class="row">

    <div class="col-sm-12">

        <div class="card">

            <div class="card-body">

                <h3 class="p-0 m-0 font-weight-bold">My Group(s)</h3>

                <a class="text-primary" data-toggle="modal" data-target="#modalCreateGroup">Create new group</a>

            </div>

        </div>

    </div>

    





    <?php $__currentLoopData = Auth::user()->userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <div class="col-sm-6 group-card">

            <div class="card p-1">

                <div class=" card-title">

                    <a href="<?php echo e(route('social.group.delete',encrypt($group->id))); ?>" class="btn btn-danger float-right btn-sm">Delete</a>



                </div>

                <div class="card-header d-flex align-items-start pb-2 pt-2">



                    <div class="avatar bg-rgba-primary p-50 m-0">

                        <div class="avatar-content">

                            <img src="<?php echo e(asset($group->avatar)); ?>" class="group-avatar">

                        </div>

                    </div>

                        <h3 class="text-bold-700 mb-0"><a href="<?php echo e(route('social.group.detail', Crypt::encrypt($group->id))); ?>" target="_blank"><?php echo e($group->title); ?></a></h3>

                </div>

            </div>

        </div>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





</div>



















<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/groups.blade.php ENDPATH**/ ?>