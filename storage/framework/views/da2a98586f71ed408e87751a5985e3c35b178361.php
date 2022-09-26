<?php $__env->startSection('title','Blog Management'); ?>
<?php $__env->startSection('heading','Blog Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="<?php echo e(route('admin.blogs.create')); ?>" class="btn btn-primary">+ Add blog</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($blog->title ?? 'N/A'); ?></td>
                                        <td><span class="badge badge-warning"><?php echo e($blog->status ?? 'N/A'); ?></span></td>
                                        <td><?php echo e($blog->updated_at->diffForHumans() ?? 'N/A'); ?></td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="<?php echo e(route('admin.blogs.edit',$blog->id)); ?>" class="btn btn-dark">View</a>

                                                <form action="<?php echo e(route('admin.blogs.destroy',$blog->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" type="submit">Trash</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/blogs/index.blade.php ENDPATH**/ ?>