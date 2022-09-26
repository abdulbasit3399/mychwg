<div class="row ">

    <div class="col-lg-12 col-12">        

        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">



            <div class="col-lg-8">

                <div class="row saved__posts">

                    <?php $__currentLoopData = Auth::user()->folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4">

                            <div class="card text-center">

                                    <a class="btnGetSavedPosts" data-url="<?php echo e(route('social.category.posts', Crypt::encrypt($item->id))); ?>"><?php echo e($item->title); ?></a>

                                </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body">

                        <h2 class="text-success">Create new Category </h2>

                        <form action="<?php echo e(route('social.create.category.folder')); ?>" method="post">

                            <?php echo csrf_field(); ?>

                            <label>Category Title</label>

                            <input type="title" name="title" class="form-control" required>



                            <button type="submit" class="btn btn-block btn-success mt-2 mb-1"><i class="fas fa-plus-circle"></i> Create Folder</button>

                        </form>

                        <small>NOTE: <em>The folder you create can be used to save posts across Materia.</em></small>

                    </div>

                </div>

            </div>



            



        </div>

    </div>

</div>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/articals.blade.php ENDPATH**/ ?>