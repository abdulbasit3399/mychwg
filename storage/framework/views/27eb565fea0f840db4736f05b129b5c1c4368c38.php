
<?php $__env->startSection('title','Finance Setting'); ?>
<?php $__env->startSection('heading','Finance Settings'); ?>


<?php $__env->startSection('content'); ?>


<section>
    <div class="row">
        <div class="col-sm-12">
            
            <div class="card">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="text-right mb-4">
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#serviceTexModal">Create/Update Taxes</button>
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#defaultServiceTexModal">Default Taxes</button>
                            </div>
                            <div class="table-responsive">

                                <table class="table datatable p-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Service Commission(%)</th>
                                        <th>Service Tax(%)</th>
                                        <th>Senior Discount(%)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($data)>0): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="tr">

                                            <td class="font-weight-bold"><?php echo e($item->location??''); ?></td>
                                            <td><?php echo e($item->service_commission??''); ?></td>
                                            <td><?php echo e($item->service_tax??''); ?></td>
                                        
                                            <td><?php echo e($item->service_discount??''); ?></td>
                                            <td class="td"><a href="#" class="btn btn-warning btn-sm edit-tax-btn" data-service-comission="<?php echo e($item->service_commission??''); ?>" data-service-tax="<?php echo e($item->service_tax??''); ?>" data-service-discount="<?php echo e($item->service_discount??''); ?>" data-location="<?php echo e($item->location??''); ?>"><i class="fa fa-edit"></i></a></td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>







<!-- Modal -->
<div class="modal fade" id="serviceTexModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Add Or Update Taxes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
            <form method="post" action="<?php echo e(route('admin.finance.location.tax')); ?>">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Select Location</label>
                        <select class="form-control select2" name="location" id="location" required="">
                                <option>Select one</option>

                            <?php $__currentLoopData = getAllLocations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->location); ?>"><?php echo e($item->location??''); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Services Commission (Percentage)</label>
                        <input type="number" min="0" id="service_commission" name="service_commission" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Service Tax (Percentage)</label>
                        <input type="number" min="0" id="service_tax" name="service_tax" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Senior Discount (Percentage)</label>
                        <input type="number" min="0" id="service_discount" name="service_discount" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save changes</button>
            </form>
      </div>
     
    </div>
  </div>
</div>
<!--set default  Modal -->
<div class="modal fade" id="defaultServiceTexModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Default Taxes value</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
             <form method="post" action="<?php echo e(route('admin.setting.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                 <h3>Default Setting</h3> 
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Services Commission (Percentage)</label>
                                            <input type="number" min="0" value="<?php echo e($setting['services_commission'] ?? ''); ?>" name="services_commission" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Services Tax (Percentage)</label>
                                            <input type="number" min="0" value="<?php echo e($setting['services_tax'] ?? ''); ?>" name="services_tax" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Senior Discount (Percentage)</label>
                                            <input type="number" min="0" value="<?php echo e($setting['services_discount'] ?? ''); ?>" name="services_discount" class="form-control">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary pull-right float-right">Save</button>
                                   
                                </div>
            </form>
      </div>
     
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    
    $(document).on('click','.edit-tax-btn',function(){

        var service_commission=$(this).data('service-comission');
        var service_tax=$(this).data('service-tax');
        var service_discount=$(this).data('service-discount');
        var location=$(this).data('location');

        
        $('#location').val(location).change();
        $('#service_commission').val(service_commission)
        $('#service_tax').val(service_tax)
        $('#service_discount').val(service_discount)

        $('#serviceTexModal').modal('show')


    });

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/finance/index.blade.php ENDPATH**/ ?>