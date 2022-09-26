<?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="card">

    <div class="card-body">

        <div>

            <h3 class="p-0 m-0  float-left">Media</h3>



            <a href="#" class="float-right p-0 m-0 upload-photo-in-album"><i class="fa fa-upload"></i><span class="font-weight-bold"> Upload</span></a>

            <a href="#" class="float-right p-0 mr-1" data-toggle="modal" data-target="#createNewalbumModal"><i class="fa fa-plus"></i><span class="font-weight-bold"> Create New Album</span></a>

        </div>

    </div>

</div>

<div class="">

    <div class="row">

        <?php $__currentLoopData = Auth::user()->userSocialAlbums->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-3">

                <div class="card p-1 text-center">

                    <?php if($item->albumPhotos->count()>0): ?>

                    <div class="media-album-popup" data-name="<?php echo e($item->name); ?>" data-id="<?php echo e($item->id); ?>">

                        <div style="height:90px;">

                            <img src="<?php echo e(asset($item->albumPhotos[0]->image)); ?>"

                                 class="media-album-popup w-100 cursor-pointer "

                                 style="height:80px;object-fit: cover;"

                                 data-src="<?php echo e(asset($item->file)); ?>"

                                 data-name="<?php echo e($item->name); ?>"

                                 data-id="<?php echo e($item->id); ?>">

                        </div>

                          <h3 class="font-weight-bold"><?php echo e($item->name??''); ?></h3>



                    </div>

                    <?php else: ?>

                        <span class="" data-name="<?php echo e($item->name); ?>" data-id="<?php echo e($item->id); ?>">

                            <div style="height:90px;">

                                <i class="fa fa-folder" aria-hidden="true"></i>

                            </div>

                            <h3 class="font-weight-bold"><?php echo e($item->name??''); ?></h3></span>



                    <?php endif; ?>





                </div>

                <div class="row p-0 m-0">

                    <div class="col-md-6 p-0">

                        <button type="button" href="<?php echo e(route('social.album.delete',$item->id)); ?>" class="btn btn-danger delete-album-btn btn-block float-left" data-id="<?php echo e($item->id); ?>"><i class="fa fa-trash text-white"></i>

                        </button>



                    </div>

                    <div class="col-md-6 p-0">



                        <button type="button" href="#" class="btn btn-primary btn-block float-rightss edit-album-btn" data-name="<?php echo e($item->name); ?>" data-id="<?php echo e($item->id); ?>"><i class="fa fa-edit text-white"></i>

                        </button>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/media.blade.php ENDPATH**/ ?>