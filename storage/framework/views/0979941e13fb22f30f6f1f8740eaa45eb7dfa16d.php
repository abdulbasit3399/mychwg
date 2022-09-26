
<?php $__env->startSection('title','Ads Setting'); ?>
<?php $__env->startSection('heading','Ads Setting'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="#" class="btn btn-primary btn-add-ads">+ Add new Ads</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Heading</th>
                                        <th>URL</th>
                                        <th>Image</th>
                                        

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <th><?php echo e($item->heading); ?></th>
                                            <th><a href="<?php echo e($item->url); ?>" data-target="tooltip" title="<?php echo e($item->url); ?>" target="_blank" class="btn btn-success">Visit link</a></th>
                                            <td>
                                                <img src="<?php echo e(asset($item->image)); ?>" class="w-50">
                                            </td>
                                            
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-primary btn-block  edit_ads_btn" data-title="Update Record" data-id="<?php echo e($item->id); ?>" data-heading="<?php echo e($item->heading); ?>" data-url="<?php echo e($item->url); ?>" data-image="<?php echo e(asset($item->image)); ?>" data-homeopath="<?php echo e($item->homeopath); ?>"
                                                    data-advocate="<?php echo e($item->advocate); ?>" data-user="<?php echo e($item->user); ?>">Edit</a>
                                                    <a href="<?php echo e(route('admin.setting.ads.delete',$item->id)); ?>" class="btn btn-danger" onclick="return confirm('Do you confirm to remove this? Yes! Press OK...')"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<!-- Modal for ADD/UPDATE Ads -->

<div class="modal fade" id="modalAddData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ads Save</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="adsForm" method="post" action="<?php echo e(route('admin.setting.ads.save')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="" id="ads_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Heading:</label>
            <input type="text" name="heading" class="form-control" required="" id="heading" value="<?php echo e(old('heading')); ?>">
            <label for="recipient-name" class="col-form-label">URl:</label>
            <input type="text" name="url" class="form-control" required id="url" value="<?php echo e(old('title')); ?>">
            <label for="message-text" class="col-form-label">Image:</label>
            <input type="file" name="image" required class="dropify" id="image" data-default-file="<?php echo e(asset('uploads/users/default.png')); ?>">
          </div>
            <h4>Ads For:</h4>
                <div class="col-md-4 mt-2">
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input"  name="homeopath" id="homeopath" value="homeopath">
                      <label class="form-check-label" for="homeopath">
                        Homeopath
                      </label>
                    </div>
                </div>

            <div class="col-md-4 mt-2">
                <div class="form-check-inline">
                    <input type="checkbox" name="advocate" class="form-check-input shopist-iCheck" id="advocate" value="advocate">
                  <label class="form-check-label" for="advocate">
                    Advocate
                  </label>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="form-check-inline">
                    <input type="checkbox" name="user" class="form-check-input" id="user" value="user">
                  <label class="form-check-label" for="user">
                    User
                  </label>
                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary save-ads-btn">Save</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">

    $(document).on('click', '.btn-add-ads', function(){
        $modal = $('#modalAddData');
        $modal.find('form').attr('action', $(this).data('action'));
        $('#brand_title').val('');
        $('#brand_id').val('');

        $modal.modal('show');
    })

     $(document).on('change', '.select-status', function(){
        var value=$(this).val();
        var url="<?php echo e(route('admin.setting.ads.status',":id")); ?>"
        url=url.replace(":id",value);

        window.location.href=url

    })
     $(document).on('click', '.save-ads-btn', function(){
        $('#adsForm').submit();
    })

    $(document).on('click', '.edit_ads_btn', function(){
        $modal = $('#modalAddData');
        $modal.find('form').attr('action', $(this).data('action'));

        $('#ads_id').val($(this).data('id'));
        $('#heading').val($(this).data('heading'));
        $('#url').val($(this).data('url'));

         $modal.find('.dropify-render img').attr('src', $(this).data('image'));

        if($(this).data('homeopath')=="homeopath")
        {
            $("#homeopath").attr('checked','checked')
        }
        if($(this).data('advocate')=="advocate")
        {
            $("#advocate").attr('checked','checked')
        }
        if($(this).data('user')=="user")
        {
            $("#user").attr('checked','checked')
        }



        $modal.modal('show');
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/setting/pages/ads.blade.php ENDPATH**/ ?>