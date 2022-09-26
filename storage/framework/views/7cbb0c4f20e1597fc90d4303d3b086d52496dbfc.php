<form id="about-form">
    <?php echo csrf_field(); ?>
    <div class="row">
    <div class="col-lg-12">
        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">About Information</h4>
                                </div>
                                <hr>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <strong>Location</strong>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" id="point" class="form-control" name="location" placeholder="Location" 
                                                                value="<?php echo e(Auth::user()->userSocialProfile->location ?? ''); ?>">

                                                                <input type="hidden" id="latitude" name="latitude" value="<?php echo e(Auth::user()->userSocialProfile->latitude ?? ''); ?>">
                                                                <input type="hidden" id="longitude" name="longitude" value="<?php echo e(Auth::user()->userSocialProfile->longitude ?? ''); ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <strong>Caption</strong>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="caption" max="150" placeholder="Caption" value="<?php echo e(Auth::user()->userSocialProfile->caption ?? ''); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <strong>About</strong>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" rows="7" class="form-control" max="250" name="about" placeholder="About"><?php echo e(Auth::user()->userSocialProfile->about ?? ''); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <strong>Website</strong>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="website" placeholder="Website" value="<?php echo e(Auth::user()->userSocialProfile->website ?? ''); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    


                                                    <div class="col-12 text-right">
                                                        <button type="submit" class="btn btn-primary mb-1 btn-update-about">Update Information</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

    </div>
</div>
</form>



<script src="<?php echo e(asset('admin/js/map_autocomplete.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $('#about-form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'<?php echo e(route('social.about.update')); ?>',
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response){
                    $('.location').text($('#point').val());
                    toastr.success(response);
                },
                error: function (errorThrown) {

                    if (errorThrown.status==500) {
                        toastr.error('Interval Server Error');
                        
                    }
                  
                }
           })
       })
    })
</script>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/about.blade.php ENDPATH**/ ?>