
<?php $__env->startSection('title',$user->name.' Details'); ?>
<?php $__env->startSection('heading',$user->name.' Details'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <!-- account start -->
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">


                        <div class="col-lg-3">
                           <img src="<?php echo e(asset($user->avatar)); ?>" class="w-100">
                            <div class="btn-group mt-3">



                                <?php if($user->status=='active'): ?>
                                <a href="<?php echo e(route('admin.member.update',['id'=>$user->id,'verify'=>'block'])); ?>" class="btn btn-warning">Disable</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('admin.member.update',['id'=>$user->id,'verify'=>'active'])); ?>" class="btn btn-primary">Active</a>
                                <?php endif; ?>
                               
                                    <a href="<?php echo e(route('admin.member.delete',['id'=>$user->id,'verify'=>$user->role])); ?>" class="btn btn-danger alert-confirm">Delete</a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">Name</strong>
                                    <span><?php echo e($user->name); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">User Name</strong>
                                    <span><?php echo e($user->user_name); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">Email</strong>
                                    <span><?php echo e($user->email); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">Phone</strong>
                                    <span><?php echo e($user->phone); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">Role</strong>
                                    <span><?php echo e($user->role); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="text-success">Status</strong>
                                    <span>
                                        <?php if($user->status=='active'): ?><sapn class="badge badge-success"><?php echo e($user->status); ?> </sapn><?php else: ?> <sapn class="badge badge-danger"><?php echo e($user->status); ?> </sapn> <?php endif; ?>
                                    </span>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- account end -->


        <!-- information start -->

            <?php if($user->role=='homeopath'): ?>

            <?php if(isset($user->HomeopathProfile)): ?>

                <div class="col-md-12 col-12 ">
                    <div class="card">  
                        <div class="card-body">
                            <h3>Profile detail</h3>

                            <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success">Registraion Number</strong>
                                        <span class="badge badge-dark"><?php echo e($user->HomeopathProfile->registration_number ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">designation</strong>
                                        <span><?php echo e($user->HomeopathProfile->designation ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">caption</strong>
                                        <span><?php echo e($user->HomeopathProfile->caption ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">specializations</strong>
                                        <span><?php echo e($user->HomeopathProfile->specializations ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">location</strong>
                                        <span><?php echo e($user->HomeopathProfile->location ?? ''); ?></span>
                                    </li>
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">Educational Designation</strong>
                                        <?php if(json_decode($user->HomeopathProfile->edu_designation)): ?>
                                            <?php $__currentLoopData = json_decode($user->HomeopathProfile->edu_designation); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a download="" href="<?php echo e(asset($item)); ?>"><span class="badge badge-info float-left">Get File</span></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                        
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">affiliations</strong>
                                        <span><?php echo e($user->HomeopathProfile->affiliations ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success text-capitalize">estabilished at</strong>
                                        <span><?php echo e($user->HomeopathProfile->estabilished_at ?? ''); ?> year ago</span>
                                    </li>
                                    
                                    
                                </ul>

                        </div>
                    </div>
                </div>

            <?php endif; ?>


                <?php if(isset($user->HomeopathServices)): ?>

                    <div class="col-md-12 col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title mb-2">Services</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Duration</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $user->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e(asset($service->thumbnail)); ?>" class="w-50">
                                            </td>
                                            <td><?php echo e($service->title); ?></td>
                                            <td>$ <?php echo e($service->price); ?></td>
                                            <td class="font-weight-bold"><?php echo e($service->duration); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                <?php endif; ?>

            <?php endif; ?>

        <!-- information start -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/member/detail.blade.php ENDPATH**/ ?>