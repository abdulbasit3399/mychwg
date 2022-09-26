        <form method="post" action="<?php echo e(route('social.upload.album.photo')); ?>" enctype="multipart/form-data" id="uploadPhotoInAlbumForm">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label>Album Name</label>
            <select class="select2 form-control" name="album_id" required="">
              <option value="" selected="">Select One</option>
                <?php $__currentLoopData = userSocialAlbums(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </select>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="dropify" required="">
          </div>

          <button type="submit" class="btn btn-primary uploadPhotoInAlbumForm-btn">Save</button>

        </form><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/album_model_body.blade.php ENDPATH**/ ?>