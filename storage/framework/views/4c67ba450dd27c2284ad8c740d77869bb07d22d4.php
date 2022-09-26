
<?php $__env->startSection('title','Services Theme'); ?>
<?php $__env->startSection('heading','Services Theme'); ?>


<?php $__env->startSection('content'); ?>
<div class="row">

    
        <div class="col-sm-12 mb-4">
            <div class="card">
                <div class="p-1">
                    <div class="row w-100">
                        <div class="col-md-6 pl-2"><h4>Services Theme(s)</h4></div>
                        <div class="col-md-6 pr-0 text-right">
                            <button class="btn btn-primary btn-add-color btn-sm" data-action="<?php echo e(route('admin.services.create')); ?>">+ New Service Theme</button>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table p-0">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Theme Title</th>
                                        <th>Color</th>
                                        <th class="text-right">Cover Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = serviceThemes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->iteration); ?></th>
                                            <th><?php echo e($item->title); ?></th>
                                            <td><div class="color_code" style="background-color: <?php echo e($item->color); ?>;"></div></td>
                                            <th class="text-right"><img src="<?php echo e(asset($item->cover)); ?>" style="width:200px;"></th>
                                            <th>
                                                <a href="<?php echo e(route('admin.services.edit',$item->id)); ?>" class="btn btn-primary">Edit</a>
                                                <a href="<?php echo e(route('admin.services.delete',$item->id)); ?>" class="btn btn-danger">Delete</a>
                                            </th>
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


<!-- Modal for ADD/UPDATE color -->
<div class="modal fade" id="modalAddColor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Theme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <label>Theme Title</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="e.g. Gray Theme" required="">
                    </div>
                    <label>Pick Color</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="color" class="w-100 rounded-0" id="color" name="color" required="">
                    </div>
                    <label>Cover</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="file" class=" dropify" id="fileChooser" name="cover" required="">
                    </div>
                    
                    
                    <div class="text-right">
                        <button class="btn btn-dark" type="submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script>
        $(document).on('click', '.btn-add-color', function(){
            $modal = $('#modalAddColor');
            $modal.find('form').attr('action', $(this).data('action'));
            $('#title').val('');

            $modal.modal('show');
        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/services/index.blade.php ENDPATH**/ ?>