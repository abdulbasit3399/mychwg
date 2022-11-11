

<style type="text/css">



/* Chrome, Safari, Edge, Opera */

input::-webkit-outer-spin-button,

input::-webkit-inner-spin-button {

  -webkit-appearance: none;

  margin: 0;

}



/* Firefox */

input[type=number] {

  -moz-appearance: textfield;

}



</style>











<div class="modal fade" id="modalRegistration" tabindex="-1" role="dialog">

                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <h5 class="modal-title mt-1" id="exampleModalLongTitle"></h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                      <span aria-hidden="true">&times;</span>

                                    </button>

                                  </div>

                                  <div class="modal-body">

                                    <div class="row">

                                        <div class="col-md-7">

                                            <div class="px-1">

                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4 text-left text-danger','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4 text-left text-danger','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                                <form action="<?php echo e(route('user.register')); ?>" method="POST">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="card-body p-0" >





                                                        <h6 class="information">Sign-up to start booking</h6>

                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <input class="form-control" type="text" name="name" placeholder="First Name*" required=""> </div>

                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name*" required=""> </div>

                                                                </div>

                                                            </div>

                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <div class="input-group"> <input class="form-control" name="email" type="email" placeholder="Email*" required=""> </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <div class="input-group"> <input class="form-control" name="password" type="password" placeholder="Password*" required=""> </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <div class="input-group"> <input class="form-control" name="phone" type="number" min="0" placeholder="Phone"> </div>

                                                                </div>

                                                            </div>

                                                        </div>



                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <select class="form-control input__country" required="" name="country">

                                                                        <option value="">Select Country</option>

                                                                        <?php $__currentLoopData = getCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>



                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="form-group">

                                                                    <div class="input-group "> <input class="form-control zip_code" name="zip_code" type="text" placeholder="Zip code*" required=""> </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> <small class="agree-text"></small>By clicking "Sign Up" you agree to the <a href="<?php echo e(route('terms')); ?>" target="_blank" class="terms">Terms & Conditions</a> </div>

                                                        <button class="btn btn-primary btn-block confirm-button" type="submit">Sign Up</button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div class="col-md-5" style="border-left:1px solid #b7b5b5;">

                                                        <h6 class="card-title mb-3">Subscribe to the following packages:</h6>

                                                        <div class="row text-center">

                                                            <div class="col-6">



                                                            <a href="<?php echo e(route('register.homeopath')); ?>" class="btn-registration">Homeopath</a>

                                                            <a href="<?php echo e(route('find.homeopath')); ?>" class="text-dark font-weight-bold"><small>Learn More</small></a>

                                                        </div>



                                                        <div class="col-6">





                                                            <a href="<?php echo e(route('advocate.register')); ?>" class="btn-registration">Advocate</a>

                                                            <a href="<?php echo e(route('advocates')); ?>" class="text-dark font-weight-bold"><small>Learn More</small></a>





                                                        </div>

                                                        </div>



                                        </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                            </div>









<?php /**PATH C:\laragon\www\mychwg\resources\views/auth/registration_modal.blade.php ENDPATH**/ ?>