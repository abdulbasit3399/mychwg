
<?php $__env->startSection('title','Services Transaction'); ?>
<?php $__env->startSection('heading','Services Transaction'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>This Month Revenue</strong>
                    <h3 class="text-primary font-weight-bold">CAD <?php echo e($this_month_revenue ?? 0); ?></h3>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Last Month Revenue</strong>
                    <h3 class="text-primary font-weight-bold">CAD <?php echo e($last_month_revenue ?? 0); ?></h3>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Overall Revenue</strong>
                    <h3 class="text-primary font-weight-bold">CAD <?php echo e($total ?? 0); ?></h3>
                  </li>
                  
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" style="width:100%;"></canvas>
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
                                        <th>ID</th>
                                        <th>Price</th>
                                        <th>Payment via</th>
                                        <th>Transaction ID</th>
                                        <th>Dated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><span class="badge badge-dark"><?php echo e($item->uuid); ?></span></th>
                                            <td><h3 class="text-success font-weight-bold">CAD <?php echo e($item->price); ?></h3></td>
                                            <td><span class="badge badge-info font-weight-bold"><?php echo e($item->payment_method); ?></span></td>
                                            <td><?php echo e($item->transaction_id ?? 'N/A'); ?></td>

                                            <td><?php echo e($item->created_at->format('M-d, Y')); ?></td>
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


<?php $__env->startSection('js'); ?>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            <?php $__currentLoopData = $revenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($data->month); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ],
        datasets: [{
            label: 'Monthly Services Revenue Analytics',
            data: [
                <?php $__currentLoopData = $revenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($data->price); ?>,
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/finance/services_transaction.blade.php ENDPATH**/ ?>