<div id="slide-out" style="padding: 45px 25px; z-index: 9999 !important; height: 100vh; overflow-y: auto; overflow-x: hidden;">
    <div id="welcome">

        <div class="row">
            <div class="col-lg-9">
                <h2 id="wlcm-hdn">Directory Assistant</h2>
                <small>Findingthe rightpractitioner for yourhealthneeds is important.
                    Letushelpyouget there</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="margin-top:20px; min-height: 300px;">


                <form id="searchCanvasForm" action="<?php echo e(url()->current()); ?>" method="get">

                    <div class="input-group canvas-input-group">
                        <input type="text" class="canvas_location_input" id="point" placeholder="Let us help you find one">
                        <div class="input-group-prepend">
                            <button type="submit"><i class="fas fa-search"></i></button>
                          </div>
                    </div>

                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                <p class="mt-4">Filter searches</p>
                <div class="canvas-nav-tabs my-4">
                    <a data-type="name" class="tab-link">Name</a>
                    <a data-type="clinic" class="bg-cyan">Clinical Focus</a>
                </div>

                <div class="canvas_content canvas_clinic">
                    <p>Miasmatic treatment isnotdisease focused- therefore, we avoidthe word
                        "specialization." Instead we approachthebranchesof adirectoryof
                        practitionersby lookingat apractitioner's clinicalfocuses</p>

                    <p style="padding-top: 10px;">Some common focuses include:</p>
                        <div class="btns">
                            <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn btn-focus" onclick="setFocusValue('<?php echo e($value); ?>')"
                                    data-value="<?php echo e($value); ?>"><?php echo e($value); ?></a>
                                <?php if($loop->iteration == 20): ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <p>Search for a clinical focus</p>

                        <div class="input-group canvas-input-group">
                            <input type="text" class="canvas_location_input" name="specialization" id="textSpecialization" placeholder="What are you looking to focus on?">
                            <div class="input-group-prepend">
                                <button type="submit"><i class="fas fa-search"></i></button>
                              </div>
                        </div>


                </div>


                <div class="canvas_content canvas_name d-none">
                    <p>Find your practitioner...</p>

                    <div class="input-group canvas-input-group">
                        <input type="text" class="canvas_location_input" name="q" placeholder="What is their name/clinic name?">
                        <div class="input-group-prepend">
                            <button type="submit"><i class="fas fa-search"></i></button>
                          </div>
                    </div>
                </div>

            </form>

            </div>
        </div>

        <div class="row" style="position: absolute;bottom: 0;margin-bottom: 20px;padding-right: 30px;right: 0;">
            <div class="col-md-12">
                <a type="button" href="#" id="slide-down-circle1" class="btn btn-primary" style="float:right;"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>


    <!-- copdata -->
</div>
<!-- slide-out div close -->


<!--================================================================-->
<!---BUTTON PULL/PUSH NAVBAR-->
<!--================================================================-->
<!-- Button to pull in nav -->
<div id="slide-down-circle" style="left:40%">
    
    
</div>

<!-- Button to pull out nav -->
<div id="click-toggle-circle" onclick="slideOut()">
    Need Help?
</div>


</div>
<?php /**PATH C:\laragon\www\mychwg\resources\views/front/components/filter_canvas_sidebar.blade.php ENDPATH**/ ?>