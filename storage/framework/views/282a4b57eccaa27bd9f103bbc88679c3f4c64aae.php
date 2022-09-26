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
        </strong>
        <strong><?php echo e($post->user->role); ?></strong>
      </div>
    </div>

    <?php if(Auth::id() == $post->user_id): ?>
    <div class="ellips ml-auto p-0">
      <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
      <div class="dropdown-menu dropdown-menu-right">
        <button class="dropdown-item post_delete_btn" data-url="<?php echo e(route('social.post.delete',$post->id)); ?>" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>
      </div>
    </div>
    <?php endif; ?>



  </div>

  <hr class="m-0">
  <div class="card-body">
    <?php echo $post->caption; ?>


    <div class="card" style="background-color: #F0F2F5;border:1px solid #ccc;box-shadow: none;">
      <div class="card-body p-1">
        <div class="media">
          <img class="mr-1" style="width: 100px;height: 100px; object-fit:cover;" src="<?php echo e(asset($post->file)); ?>">
          <div class="media-body text-dark">
            <h5 class="mt-0 font-weight-bold"><?php echo e($post->caption); ?></h5>
              
            <button type="button" class="btn__open_resource btn-read w-50 text-center" style="border: none;" 
              data-title="<?php echo e($post->caption); ?>" 
              data-author="<?php echo e($post->user->name); ?>" 
              data-src="<?php echo e($post->file ?  asset($post->file) : asset('uploads/img/resource.png')); ?>" 
              data-description="<?php echo $post->desc; ?>" 
              data-pdf="<?php if(isset($post->attachement)): ?> <?php echo e(asset($post->attachement)); ?> <?php endif; ?>"
              >
                  Open Resource
                </button>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/load_social_resource.blade.php ENDPATH**/ ?>