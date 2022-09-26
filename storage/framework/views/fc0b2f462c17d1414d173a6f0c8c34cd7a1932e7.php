<div class="card card_feed_posts">

            <div class="card-header post-timeline-card-header">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="avatar mr-1">
                        <a href="<?php echo e(route('social.connection.profile', $post->user->user_name ?? '' )); ?>"><img class="profile-avatar-small1" src="<?php echo e(asset($post->user->avatar)); ?>" alt="<?php echo e($post->user->name); ?>"></a>
                    </div>

                    <div class="user-page-info">
                        <strong class="mb-0 d-block">
                            <a class="post-user-name post-feed-title" href="<?php echo e(route('social.connection.profile', $post->user->user_name ?? '' )); ?>"><?php echo e($post->user->name ?? 'N/A'); ?></a>
                                <?php if($post->user_social_group_id != ""): ?>
                                    &#62;
                                    <a href="<?php echo e(route('social.group.detail', Crypt::encrypt($post->socialGroup->id))); ?>" class="text-dark"> <?php echo e($post->socialGroup->title ?? ''); ?></a>
                                <?php endif; ?>
                                <?php
                                if($post->shared_from && $post->is_shared):
                                    $orignal_post = \App\Models\SocialPost::find($post->shared_from);
                                ?>
                                    <span>&nbsp;Shared</span>
                                    <a class="post-user-name post-feed-title" href="<?php echo e(route('social.connection.profile', $orignal_post->user->user_name ?? '' )); ?>" style="font-size:15px!important"><?php echo e($orignal_post->user->name ?? 'N/A'); ?></a>
                                    <span>Post</span>
                                <?php endif; ?>
                        </strong>
                        <strong><?php echo e($post->user->role); ?></strong>
                    </div>
                </div>

                    <div class="ellips ml-auto p-0">
                        <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if($post->is_shared == true): ?>
                                <a href="<?php echo e(route('social.share.resource', base64_encode($post->id))); ?>"
                                   class="dropdown-item">
                                   <i class="fas fa-share"></i> Hold post
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('social.share.resource', base64_encode($post->id))); ?>"
                                    class="dropdown-item"><i class="fas fa-share"></i> Share post
                                </a>
                            <?php endif; ?>
                            <?php if(auth()->user()->id == $post->user_id): ?>
                            <button class="dropdown-item post_delete_btn"
                                    data-url="<?php echo e(route('social.post.delete',$post->id)); ?>"
                                    type="button">
                                    <i class="fa fa-trash"></i> Delete
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>

            <hr class="m-0">

            <div class="card-body">
                <?php echo $post->caption; ?>

                <?php if($post->media_type != ''): ?>
                    <?php if($post->media_type=='video'): ?>
                        <div class="main-video-post-div showable-video">
                            <video data-type="video" class="video-preview post-timeline-video" controls="" src="<?php echo e(asset($post->file)); ?>"  />
                        </div>
                    <?php else: ?>
                        <img data-type="image" class="post-timeline-img media-popup showable-img" src="<?php echo e(asset($post->file)); ?>" alt="">
                    <?php endif; ?>
                <?php endif; ?>
                <p><?php echo $post->desc??''; ?></p>
            </div>

            <?php echo $__env->make('vendor.social-network.ajax.post_reaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/load_social_post.blade.php ENDPATH**/ ?>