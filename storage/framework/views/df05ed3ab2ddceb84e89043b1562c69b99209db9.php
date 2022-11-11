<div class="less-comments-div">
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <?php if($loop->iteration<3): ?>

            <div class="col-sm-12 mt-2 parent-div commentno<?php echo e($comment->id); ?>">
                <div class="img-div">
                    <img class="profile-avatar-small1 float-left" src="<?php echo e(asset($comment->user->avatar)); ?>" alt=""><sapn class="ml-1"><strong class="image-name"><?php echo e($comment->user->name); ?></strong></sapn>
                </div>
                <div class="comments ml-3 " style="border-radius: 5px; background-color: #f4f4f4;">


                    <div class="comment-text-div comments-show ">

                        <!-- <div class="ellips ml-auto p-0 float-right" style="font-weight: 700;">
                                <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item delete_comment" data-id="<?php echo e($comment->id); ?>" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>

                                </div>
                        </div> -->

                        <p class=" mb-0 justify-content-around"><?php echo e($comment->comment); ?></p>
                        <div class="reply-div">
                            <input type="hidden" value="<?php echo e($comment->id); ?>" class="reply_comment_id">
                            <a href="#" class=" mb-1 reply">Reply</a>
                            <?php if(Auth::user()->id==$comment->user_id): ?>
                            <a class=" delete_comment text-danger pl-1" data-id="<?php echo e($comment->id); ?>" data-removeclass="commentno<?php echo e($comment->id); ?>">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>

                <?php if(count($comment->child)): ?>
                    <?php echo $__env->make('vendor.social-network.ajax.comments',['comments'=>$comment->child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        <?php else: ?>
        <a href="#" class="pl-2 show_more_comments" style="text-decoration: underline;">Show All Comments</a>
        <?php break; ?>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="show-all-comments-div d-none">
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <div class="col-sm-12 mt-2 parent-div commentno<?php echo e($comment->id); ?>">
            <div class="img-div">
                <img class="profile-avatar-small1 float-left" src="<?php echo e(asset($comment->user->avatar)); ?>" alt=""><sapn class="ml-1"><strong class="image-name"><?php echo e($comment->user->name); ?></strong></sapn>
            </div>
            <div class="comments ml-3 " style="border-radius: 5px; background-color: #f4f4f4;">


                <div class="comment-text-div comments-show">

                    <!-- <div class="ellips ml-auto p-0 float-right" style="font-weight: 700;">
                            <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item delete_comment" data-id="<?php echo e($comment->id); ?>" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>

                            </div>
                    </div> -->

                    <p class=" mb-0 justify-content-around"><?php echo e($comment->comment); ?></p>
                    <div class="reply-div">
                        <input type="hidden" value="<?php echo e($comment->id); ?>" class="reply_comment_id">
                        <a href="#" class=" mb-1 reply">Reply</a>
                        <?php if(Auth::user()->id==$comment->user_id): ?>
                            <a class=" delete_comment text-danger pl-1" data-id="<?php echo e($comment->id); ?>" data-removeclass="commentno<?php echo e($comment->id); ?>">Delete</a>
                        <?php endif; ?>

                    </div>
                </div>


            </div>

            <?php if(count($comment->child)): ?>
                <?php echo $__env->make('vendor.social-network.ajax.comments',['comments'=>$comment->child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="#" class="pl-2 show_less_comments_btn  mt-5" style="text-decoration: underline;">Show less</a>

</div>


<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php /**PATH C:\laragon\www\mychwg\resources\views/vendor/social-network/ajax/comments.blade.php ENDPATH**/ ?>