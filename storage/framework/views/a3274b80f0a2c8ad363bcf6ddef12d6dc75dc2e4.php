
<?php $__env->startSection('title','Team Management'); ?>
<?php $__env->startSection('heading','Team Management'); ?>


<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">


    <!-- BEGIN: Content-->
    <section id="data-list-view" class="data-list-view-header">


        <!-- DataTable starts -->
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th>Sr. #</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>CREATED</th>
                        <th>ROLE</th>
                        <th class="float-right pr-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($user->name ?? 'N/A'); ?></td>
                        <td class="product-name"><?php echo e($user->email ?? 'N/A'); ?></td>
                        <td class="product-category"><?php echo e($user->created_at->diffForHumans() ?? 'N/A'); ?></td>

                        <td>
                            <div class="chip chip-success">
                                <div class="chip-body">
                                    <div class="chip-text"><?php echo e($user->roles[0]->name); ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="product-action text-right">
                            <div class="btn-group">
                                <a href="" title="Edit" class="btn btn-primary"><i class="feather icon-edit"></i></a>
                                <a href="<?php echo e(route('admin.teams.remove', $user->id)); ?>" title="Trash" class="btn btn-danger alert-confirm"><i class="feather icon-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- DataTable ends -->

        <!-- add new sidebar starts -->
        <div class="add-new-data-sidebar">
            <div class="overlay-bg"></div>
            <div class="add-new-data">
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase">Add team member</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                <form action="<?php echo e(route('admin.teams.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-3">
                        <div class="row">

                            <?php if(count($errors) > 0): ?>
                                <div class="col-sm-12 data-field-col">
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Select role</label>

                                <select class="form-control" name="role" required>
                                    <option value="" hidden>Select a role</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-sm-12 data-field-col">
                                <h5 class="alert alert-warning"><i class="feather icon-alert-circle"></i> Assign the role to team member as per permissions attached to designated role in the roles panel.</h5>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="btn-group">
                        <button class="btn btn-relief-primary">Add Data</button>
                        <a class="btn btn-relief-danger cancel-data-btn text-white">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- add new sidebar ends -->
    </section>
    <!-- END: Content-->

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/teams/teams.blade.php ENDPATH**/ ?>