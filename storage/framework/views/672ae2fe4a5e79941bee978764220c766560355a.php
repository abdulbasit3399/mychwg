<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($loop->first): ?><div class="row res-card-row"><?php endif; ?>
            <div class="col-md-4">
                <div class="card">
                                <div class="card-header post-timeline-card-header">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="avatar mr-1">
                        <a href="<?php echo e(route('social.connection.profile', $item->post->user->user_name ?? '' )); ?>"><img class="profile-avatar-small1" src="<?php echo e(asset($item->post->user->avatar)); ?>" alt="<?php echo e($item->post->user->name); ?>"></a>
                    </div>

                    <div class="user-page-info">
                        <strong class="mb-0 d-block">
                            <a class="post-user-name" href="<?php echo e(route('social.connection.profile', $item->post->user->user_name ?? '' )); ?>"><?php echo e($item->post->user->name ?? 'N/A'); ?></a>

                                <?php if($item->post->user_social_group_id != ""): ?>
                                    &#62;
                                    <a href="<?php echo e(route('social.group.detail', Crypt::encrypt($item->post->socialGroup->id))); ?>" class="text-dark"> <?php echo e($item->post->socialGroup->title ?? ''); ?></a>
                                <?php endif; ?>
                        </strong>
                        <span class="font-small-2"><span class="font-weight-bold"><?php echo e($item->post->user->role); ?></span> | <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($item->post->created_at))->diffForHumans()); ?></span>
                        <br>
                    </div>
                </div>

                <?php if(Auth::id() == $item->post->user_id): ?>
                    <div class="ellips ml-auto p-0">
                        <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item post_delete_btn" data-url="<?php echo e(route('social.post.delete',$item->post->id)); ?>" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>
                            <button class="dropdown-item post_edit_btn" data-url="<?php echo e(route('social.post.edit',$item->post->id)); ?>" type="button"><i class="fa fa-edit mr-1"></i>Edit</button>

                            <button  class="dropdown-item post_status_change_btn" data-url="<?php echo e(route('social.post.change.status',$item->post->id)); ?>" data-status="<?php if($item->post->status=='Public'): ?> Private <?php else: ?> Public <?php endif; ?>" type="button"><i class="fa fa-check mr-1"></i>
                                    <?php if($item->post->status=='Public'): ?> Private <?php else: ?> Public <?php endif; ?>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>



            </div>

                        <hr class="m-0">
            <div class="card-body">
                <h4 class="caption-paragraph"><?php echo e($item->post->caption); ?></h4>
                <small><?php echo e(\Carbon\Carbon::parse($item->post->created_at)->format('j F, Y')); ?></small>
                <?php if($item->post->media_type != ''): ?>

                    <?php if($item->post->media_type=='video'): ?>

                        <div class="main-video-post-div showable-video">
                            <video data-type="video" class="video-preview post-timeline-video" controls="" src="<?php echo e(asset($item->post->file)); ?>"  />
                        </div>


                    <?php else: ?>
                        <img data-type="image" class="post-timeline-img media-popup showable-img" src="<?php echo e(asset($item->post->file)); ?>" alt="">
                    <?php endif; ?>

                <?php endif; ?>
                <p><?php echo $item->post->desc??''; ?></p>

            </div>

                </div>
            </div>
        <?php if($loop->last): ?></div><?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h3 class="alert alert-warning text-center">No saved post in this folder available right now.</h3>
    <?php endif; ?>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/saved_posts/index.blade.php ENDPATH**/ ?>