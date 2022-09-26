
<?php $__env->startSection('title','Blog Management'); ?>
<?php $__env->startSection('heading','Blog Management'); ?>
<?php $__env->startSection('css'); ?>
<style>
 .ck-editor__editable
{
 min-height: 15vw !important;
}
.ck-file-dialog-button
{
    display: none;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">


        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if((isset($blog))): ?>
                                <form action="<?php echo e(route('admin.blogs.update',$blog->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                            <?php else: ?>
                                <form action="<?php echo e(route('admin.blogs.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e($blog->title ?? old('title')); ?>" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="<?php echo e($blog->slug ?? old('slug')); ?>" required>
                                    </fieldset>
                                </div>
                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="">Description</label>
                                        <textarea name="description" class="form-control" id="description"><?php echo $blog->description ?? old('description'); ?></textarea>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="basicInput">Featured Image</label>
                                    <input type="file" class="dropify" name="featured_image" data-default-file="<?php if(isset($blog->featured_image)): ?><?php echo e(asset($blog->featured_image) ?? ''); ?><?php endif; ?>">
                                    <input type="text" class="form-control-md w-100 rounded-0" required="" name="featured_image_alt" placeholder="Featured Image Alt Title" value="<?php echo e($blog->featured_image_alt ?? old('featured_image_alt')); ?>">
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Status</label>
                                        <select class="form-control" name="status" required>
                                            <?php if(isset($blog->status)): ?>
                                            <option value="<?php echo e($blog->status); ?>" hidden><?php echo e($blog->status); ?></option>
                                            <?php endif; ?>
                                            <option value="Latest">Latest</option>
                                            <option value="Trending">Trending</option>
                                            <option value="Featured">Featured</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </fieldset>
                                </div>


                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="" required><?php echo e($blog->meta_description ?? old('meta_description')); ?> </textarea>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Keywords</label>
                                        <input type="text" class="form-control" placeholder="nature, wallpaper, health" name="keywords" required value="<?php echo e($blog->keywords ?? old('keywords')); ?>">
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group pull-right">
                                        <button class="btn btn-relief-primary" type="submit">Save Changes</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                descriptionEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

<script>
    $('[name="title"]').keyup(function(){
        var str = $(this).val(); 
        $('[name="slug"]').val(str.replace(/\s+/g, '-').toLowerCase());    
    });
    
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/blogs/add-edit.blade.php ENDPATH**/ ?>