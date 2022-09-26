<div class="row">
    <div class="col-lg-12">
        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body">
                <h3 class="p-0 m-0 font-weight-bold">Message(s)</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-12 render-messages" id="render-messages">
        <?php echo $__env->make('ajax.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/messages.blade.php ENDPATH**/ ?>