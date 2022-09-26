<div class="card profile_navs">
    <div class="card-body p-1">

        <nav class="">
          <div class="nav nav-tabs m-0" id="nav-tab" role="tablist">
                <a class="nav-link active text-dark" id="nav-feed-tab" data-toggle="tab" href="#nav-feed" role="tab" aria-controls="nav-feed" aria-selected="true">
                    <i class="fas fa-comment-alt "></i> Feed
                </a>
                <a class="nav-link text-dark" id="nav-resource-tab" data-toggle="tab" href="#nav-resource" role="tab" aria-controls="nav-resource" aria-selected="false">
                    <i class="fas fa-book "></i> Resource
                </a>
                <a class="nav-link text-dark" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">
                    <i class="fas fa-info-circle"></i> About
                </a>

                <a class="nav-link text-dark" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="false">
                    <i class="fas fa-users"></i> Groups
                </a>

          </div>
        </nav>

    </div>
</div>


    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-feed" role="tabpanel" aria-labelledby="nav-feed-tab">
        <div class="results" id="results"></div>
        <div class="row res-card-row">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-12">
                    <?php if($post->post_type == 'Resources'): ?>
                    <?php echo $__env->make('vendor.social-network.ajax.load_social_resource', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <?php echo $__env->make('vendor.social-network.ajax.load_social_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-12">
                    <div class="card card_feed_posts">
                        <h1 class="m-5 p-5 text-center">No post found</h1>
                    </div>
                </div>
             <?php endif; ?>

        </div>

      </div>
      <div class="tab-pane fade" id="nav-resource" role="tabpanel" aria-labelledby="nav-resource-tab">

            <div class="row res-card-row">
                <?php ($found=0); ?>
                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($post->file != null): ?>
                     <?php ($found=1); ?>
                        <div class="col-md-4 text-center ">
                            <?php echo $__env->make('vendor.social-network.pages.resources.resource_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$found): ?>
                        <div class="col-md-12">
                            <div class="card card_feed_posts">
                                <h1 class="m-5 p-5 text-center">No data found</h1>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>

      </div>

      <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

        <div class="card">
            <div class="row card-body">

                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <strong>Location</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" readonly value="<?php echo e($user->userSocialProfile->location ?? ''); ?>">

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <strong>Caption</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" readonly value="<?php echo e(Auth::user()->userSocialProfile->caption ?? ''); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <strong>About</strong>
                        </div>
                        <div class="col-md-10">
                            <textarea type="text" rows="7" class="form-control" readonly><?php echo e($user->userSocialProfile->about ?? ''); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <strong>Website</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" readonly value="<?php echo e($user->userSocialProfile->website ?? ''); ?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>

      </div>

      <div class="tab-pane fade " id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $user->userSocialGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

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
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center m-auto">
                    <h6 class="alert alert-danger">There are no groups followed by this person.</h6>
                </div>

            <?php endif; ?>


        </div>
      </div>

    </div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/connection/user_profile_tabs.blade.php ENDPATH**/ ?>