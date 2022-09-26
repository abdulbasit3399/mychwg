<?php $__env->startSection('title','homeopath Dashbaord'); ?>
<?php $__env->startSection('heading','Get More Badges'); ?>
<?php $__env->startSection('css'); ?>
<style>
    .zoom-icon
    {
        background-color: #000;
        color: #fff;
        padding: 16px;
        font-size: 30px;
        margin-right: 20px;
    }

    .h5-heading
    {
        color: #B1B3B9;
        font-weight: bold;
    }

    .btn-attach,
    .btn-attach:hover
    {
        background-color: #4267B2;
        color: #fff;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 3px;
        border: 0;
    }
    .permissions img
    {
        width: 45px;
        float: right;
    }
    .permissions label
    {
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
    }
    .permissions input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;

  border-radius: 50%;
  width: 30px;
  height: 30px;

  border: 2px solid #999;
  transition: 0.2s all linear;
  margin-right: 5px;

  position: relative;
  top: 12px;
  cursor: pointer;
}

.permissions input:checked {
  border: 8px solid black;
  outline: unset !important /* I added this one for Edge (chromium) support */
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- users edit start -->
<form method="POST" action="<?php echo e(route('get.more.badges.post')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
<section class="users-edit pb-4">
    <div class="card">
        <div class="card-content">
                        <div class="card-body">
                <div class="media">
                    <i class="fas fa-award zoom-icon"></i>
                  <div class="media-body">
                    <h3 class="mt-0 font-weight-bold">Badges & Accolades</h3>
                    <h5 ><span class="text-muted">By</span> <a href="<?php echo e(route('index')); ?>" target="_blank">Chwg.ca</a></h5>
                  </div>
                </div>

                <div class="permissions mt-2">
                    <h5 class="h5-heading">Which type of badge do you want to get? <span class="text-danger">*</span></h5>
                    
                    <?php $__currentLoopData = badges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($loop->first): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <div class="mb-1  border-bottom">
                        <input type="radio" name="badge_id" value="<?php echo e($item->id); ?>" id="<?php echo e($item->id); ?>" required="" class="badge-redio" data-src="<?php echo e(asset($item->path)); ?>" data-name="<?php echo e($item->title); ?>">
                        <label for="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></label>
                        
                            <?php if($key==1): ?>
                            <img src="<?php echo e(asset('uploads/badges/default_badge.png')); ?>" class=" ml-auto pull-right badge-img" style="width: 200px;height: 185px;border-radius: 20px;">
                                
                            <?php endif; ?>
                            
                        
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

                    <h6 class="bg-rgba-info p-1 m-0"><span class="text-warning">NOTE: </span> Give your correct information in order to approve your request and verify your application. Not all applicaitons are verified. It will depend on your profile and acheivements.</h6>
                    <br>
                    
                    <label>Badge Name:</label>
                    <input type="text" class="form-control badge-name mb-2" value="" readonly="">
                    <h5 class="h5-heading">Tell us something about yourself. Why we verify your request? (Min. 100 characters) <span class="text-danger">*</span></h5>
                    <textarea class="form-control" name="description" rows="5" minlength="100" required=""></textarea>

                    <label>URL:(optional)</label>
                    <input type="text" class="form-control badge-info-url mb-2" name="url" value="">

                    <h5 class="h5-heading mt-2">Any attachement document</h5>
                    <input type="file" class="form-control" name="attachement">

                    <div class="text-right mt-2">
                        <button type="submit" class=" btn-attach">Submit my request</button>
                    </div>


            </div>
        </div>
    </div>
    
</section>
<!-- users edit ends -->
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('change','.badge-redio',function(){
        var src =$(this).data('src')
        var title =$(this).data('name')
        
        $('.badge-img').attr('src',src)
        $('.badge-name').attr('value',title)
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/get_more_badges.blade.php ENDPATH**/ ?>