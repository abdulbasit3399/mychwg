<?php $__env->startSection('title', 'Homeopath Registration'); ?>

<?php $__env->startSection('content'); ?>

<header>

    <div class="wrapper">

        <div id="header_content" style="background:#dcf2fa url(<?php echo e(asset('front/assets')); ?>/templates-assets/header/img/account.jpg) no-repeat 50% center;background-size: cover;">

            <?php echo $__env->make('front.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--PAGE BANNER-->

            <div class="banner-box">

                <div class="banner-top text-center">

                    <div class="inner">

                        <h2><?php echo e(env('APP_NAME')); ?> Homeopath Registration</h2>

                        <p>Provide your correct credentials to register at CHWG</p>

                        <p class="cmp-button-row non-mobile-only">

                        <div class="right-box">

                            <div class="screenshot"></div>

                        </div>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>

<!--END HEADER-->







<section class="content mb-5" id="login">

    <div class="container custom-extra-top-style">
        <div class="row justify-content-center mb-4">
            <div class="col-xs-12 text-center">
                <img src="<?php echo e(asset('uploads/img/16.png')); ?>" width="150">
                <p>We help you help others </p>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-6 text-center">

                <div class="panel panel-login">

                    <div class="panel-heading">
                        
                        <div class="row justify-content-center mt-3">

                            <div class="col-xs-12 text-center">

                                
                                <h3>Register your Remport Account</h3>

                            </div>

                        </div>

                        <hr>

                    </div>

                    <div class="panel-body">

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4 text-left text-danger','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4 text-left text-danger','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                        <form method="post" action="<?php echo e(route('user.register')); ?>">

                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="role" value="homeopath">

                            <div class="form-group has-feedback">

                                <input name="name" class="form-control" placeholder="First Name*" type="text" required="">

                                <span class="fa fa-user form-control-feedback"></span>

                            </div>

                            <div class="form-group has-feedback">

                                <input name="last_name" class="form-control" placeholder="Last Name*" type="text" required="">

                                <span class="fa fa-user form-control-feedback"></span>

                            </div>

                            

                            <div class="form-group has-feedback">

                                <input name="email" id="email" tabindex="1" class="form-control" placeholder="Email address*" type="email" required="">

                                <span class="fa fa-inbox form-control-feedback"></span>

                            </div>

                                                                

                          

                            <div class="form-group has-feedback">

                                <input name="password" id="password" tabindex="2" class="form-control" placeholder="Password*" type="password" required="">

                                <span class="fa fa-lock form-control-feedback"></span>

                            </div>

                            <div class="form-group has-feedback">

                                <input class="form-control" name="phone" type="number" min="0" placeholder="Phone"> 

                                <span class="fa fa-phone form-control-feedback"></span>

                            </div>



                            <div class="form-group">

                                <select class="form-control input__country" name="country" required>

                                    <option value="">Select Country</option>

                                  <?php $__currentLoopData = getCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                      <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>

                            </div>



                            <div class="form-group has-feedback">

                                <input name="state" class="form-control" placeholder="State*" type="text" required="">

                                <span class="fa fa-globe form-control-feedback"></span>

                            </div>



                            <div class="form-group has-feedback">

                                    <input class="form-control zip_code" name="zip_code" type="text" placeholder="Zip code/Postal code*" required="">

                                    <span class="fa fa-list form-control-feedback"></span>

                            </div>



                            

                            <div class="form-group">

                                <div class="row justify-content-center">

                                    <div class="col-sm-6 text-center">

                                        <button type="submit" class="form-control btn btn-secondary">Register my account</button>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="text-center">

                                            <a href="<?php echo e(route('login')); ?>" tabindex="5" class="register-new-user">I already have an account</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>









<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/auth/register_homeopath.blade.php ENDPATH**/ ?>