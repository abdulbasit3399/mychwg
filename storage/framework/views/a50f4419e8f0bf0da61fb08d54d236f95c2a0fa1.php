
<?php $__env->startSection('title','Roles'); ?>
<?php $__env->startSection('heading','Roles & Permissions'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-7">
        <div class="card collapse-icon accordion-icon-rotate min-height-500">
            <div class="card-header">
                <h4 class="card-title">Roles & Permission</h4>
            </div>
            <div class="card-body">

                <div class="accordion" id="accordionExample" data-toggle-hover="true">

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="collapse-margin">
                        <div class="card-header" data-toggle="collapse" role="button" data-target="#collapse<?php echo e($role->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($role->id); ?>">
                            <span class="lead collapse-title font-weight-bold">
                                <?php echo e($role->name); ?>

                            </span>
                        </div>
                        <div id="collapse<?php echo e($role->id); ?>" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge badge-dark text-capitalize"><?php echo e(str_replace('_', ' ', $permission->name)); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <hr>
                                <div class="text-right">
                                    <a href="<?php echo e(route('admin.roles.delete', $role->id)); ?>" class="btn btn-danger font-weight-bold" 
                                        onclick="return confirm('Do you realy want to delete this role? The user connected with this role will be exempted when you delete it.')">Delete <?php echo e($role->name); ?></a>
                                    <a href="<?php echo e(route('admin.roles.edit', $role->id)); ?>" class="btn btn-relief-dark">Update <?php echo e($role->name); ?> role</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card min-height-500">
            <div class="card-body">
                <h4 class="pb-1">Add new Role</h4>

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="form form-horizontal roles-form" action="<?php echo e(route('admin.roles.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="fname-icon" class="form-control" name="name" placeholder="Role Name" autocomplete="off" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-zap"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="table-responsive border rounded px-1 ">
                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50"></i>Permission</h6>
                                    <ul class="list-group list-group-flush">

                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="checkbox" id="<?php echo e($permission->id); ?>" value="<?php echo e($permission->id); ?>" name="permissions[]" checked>
                                            <label class="form-check-label text-capitalize float-right font-weight-bold" for="<?php echo e($permission->id); ?>"><?php echo e(str_replace('_', ' ', $permission->name)); ?></label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12 text-right mt-2">

                                <div class="btn-group">
                                    <button type="submit" class="btn btn-relief-primary">Submit</button>
                                    <a class="btn btn-relief-danger" href="<?php echo e(url()->previous()); ?>">Cancel</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/roles/roles.blade.php ENDPATH**/ ?>