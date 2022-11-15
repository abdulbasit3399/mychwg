<div class="row">

    <div class="col-lg-9 col-12">

        <div class="card">
            <div class="card-body">
                <div class="cover-container">
                    <button class="btn-update-cover" data-toggle="modal" data-target="#modalUpdateAvatar"><i class="fas fa-camera"></i> Edit Cover Photo</button>
                    <img class="profile-cover-avatar" src="<?php echo e(asset(Auth::user()->userSocialProfile->cover)); ?>" alt="">
                    <div class="cover-heading-content">
                        <h6 class="my-0 font-weight-bold text-white"><?php echo e(Auth::user()->userSocialProfile->caption ?? 'N/A'); ?></h6>
                        <small class="d-block text-white"><?php echo e(Auth::user()->userSocialProfile->about ?? 'N/A'); ?></small>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="media">
                            <img class="mr-1 profile-avatar-small" src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                            <div class="media-body post-feed-section pt-0">

                                <button
                                    class=" btn-post btn-block text-primary font-weight-bold border-0 btnPostWritePopup">
                                    Share something with the community!
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="results" id="results">
            <?php echo $__env->make('vendor.social-network.ajax.load_posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
    <div class="col-lg-3 col-12 photo-aslbum">
        <div class="card ">
            <div class="card-body">
                <div>
                    <h6 class="float-left">Photo Albums</h6>
                </div>
                <div class="social-album-div text-center mt-1">
                    <?php echo $__env->make('vendor.social-network.pages.albums', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>


        <div class="card ">
            <div class="card-body pt-1">
                <h6>Sponsored</h6>
                <div class="row">
                        <?php $__currentLoopData = adsSponsorship(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 pb-2">

                                    <img src="<?php echo e(asset($item->image)); ?>" class="media-popup w-100"  data-src="<?php echo e(asset($item->image)); ?>">
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>


    </div>
</div>

<?php /**PATH C:\laragon\www\mychwg\resources\views/vendor/social-network/pages/news_feed.blade.php ENDPATH**/ ?>