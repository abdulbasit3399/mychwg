

<?php $__env->startSection('title',ucfirst($users[0]->role??'').' '.'Members'); ?>
<?php $__env->startSection('heading',ucfirst($users[0]->role??'').' '.'Members'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body pb-0">
                           <div class="row">
                               <div class="col-md-12 input-group">
                                   <select name="status" class="form-inline form-control" id="status">
                                       <option  value="<?php echo e(route('admin.member.index',['member'=>$member??''])); ?>">All</option>
                                       <option <?php if($status=='active'): ?> selected   <?php endif; ?> value="<?php echo e(route('admin.member.index',['member'=>$member??'','status'=>'active'])); ?>">Active</option>
                                       <option <?php if($status=='disabled'): ?> selected  <?php endif; ?> value="<?php echo e(route('admin.member.index',['member'=>$member??'','status'=>'disabled'])); ?>">Disabled</option>
                                   </select>
                                   <button type="button" class="btn btn-sm btn-success" id="filter">Filter</button>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table datatable p-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($users)>0): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($user->name??''); ?></td>
                                            <td><?php echo e($user->email??''); ?></td>
                                            <td><?php echo e($user->phone??''); ?></td>
                                            <td><?php if($user->status=='active'): ?><span class="badge badge-success"><?php echo e($user->status); ?> </span><?php else: ?> <sapn class="badge badge-danger"><?php echo e($user->status); ?> </sapn> <?php endif; ?></td>
                                            <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                                            <th class="text-right">
                                                <a href="<?php echo e(route('admin.member.detail', encrypt($user->id))); ?>" class="btn btn-dark btn-block btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                            </th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click','#filter',function(){
            var val=$('#status').val();
            window.location.href=val

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/member/list.blade.php ENDPATH**/ ?>