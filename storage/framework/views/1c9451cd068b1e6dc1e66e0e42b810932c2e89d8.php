<div class="card-footer bg-white post-actions">
    <div class="row text-center">
        <input type="hidden" class="social_post_id" value="<?php echo e($post->id); ?>">
        <div class="col-sm-6 col-md-4 col-lg-4 col-4 post-action-btns">
            <?php if(count($post->likes)>0): ?>
                <a class="text-dark like-btn"><i class="fas fa-heart text-danger"></i> Like <span class="total-likes"><?php echo e(count($post->likes)); ?></span></a></a>
            <?php else: ?>
                <a class="text-dark like-btn"><i class="fas fa-heart"></i> Like <span class="total-likes"><?php echo e(count($post->likes)); ?></span></a></a>
            <?php endif; ?>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-4 post-action-btns">
            <a href="##" class="text-dark comment-btn"><i class="far fa-comments"></i> Comment</a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-4">
            <i class="fas fa-save fa-1x btnSavePostInFolder" data-post-id="<?php echo e($post->id); ?>" title="Save post"></i>
        </div>

        <div class="col-md-12 comments-div border-top mt-2">

            <div class="card pt-0 mb-0">
                <div class="card-body pt-0">
                    <div class="row comments-row text-left">
                        <?php echo $__env->make('vendor.social-network.ajax.comments',['comments'=>$post->comments,'post_id'=>$post->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>

            </div>


            <!---=============================================-->
                            <!--COMMENT FORM-->
            <!---=============================================-->

            <form action="<?php echo e(route('social.save.comment')); ?>" class="comment-form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input class="parent_post_id" type="hidden" value="<?php echo e($post->id); ?>" name="parent_post_id">
                <input class="comment_id" type="hidden" value="" name="parent_comment_id">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="media px-2">
                            <img class="m-auto profile-avatar-extra-small" src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                            <div class="media-body">
                                <input type="text" class="form-control comment-input" name="comment" required="" placeholder="Write here comment...">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!---=============================================-->
                            <!--END COMMENT FORM-->
            <!---=============================================-->


        </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\mychwg\resources\views/vendor/social-network/ajax/post_reaction.blade.php ENDPATH**/ ?>