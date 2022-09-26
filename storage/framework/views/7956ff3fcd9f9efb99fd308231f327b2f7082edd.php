<div class="row">
    <form class="form-horizontal" method="POST" action="<?php echo e(route('homeopath.complete.profile')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
                    <div class="col-lg-12 p-0">
                        <div class="card card00 m-2 border-0">
                            <div class="row text-center justify-content-center px-3">
                                
                                <h3 class="mt-4">Registration Form</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 px-3 font-weight-bold text-danger">
                                     <?php if($errors->any()): ?>
                                         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div><?php echo e($error); ?></div>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                </div>
                            </div>

                            <div class="d-flex flex-md-row  mt-4 flex-column-reverse">
                                <div class="col-md-4">
                                    <div class="card1">
                                        <ul id="progressbar" class="text-center">
                                            <li class="active step0"></li>
                                            <li class="step0 second-div"></li>
                                            <li class="step0 third-div"></li>
                                            
                                        </ul>
                                        <h6 class="mb-5">Practitioner Information</h6>
                                        <h6 class="mb-5">User Profile</h6>
                                        <h6 class="mb-5">Submit</h6>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card2 first-screen show ml-2">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Add your Homeopathy registration number in order to verify your profile<span>*</span></label>
                                                            <input type="text" name="registration_number" class="form-control required text-uppercase" placeholder="Registration number e.g. (STH1345R)" required>
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Provide your full medical designation<span>*</span></label>
                                                            <input type="text" name="designation" class="form-control required" placeholder="Designation" required>
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Add Focuses tags<span>*</span></label>
                                                            <input type="text" name="specializations" class="form-control required" placeholder="Focuses" id="form-tags-1" required>
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Provide any other educational designations (optional)</label>

                                                            <input type="text" name="educational_information" class="form-control" placeholder="Educational information">
                                                            <br>
                                                            <input type="file" name="edu_designation[]" class="form-control " placeholder="" >
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            
                                            
                                            <div class="col-sm-12 append_designation_div">
                                                
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="">
                                                           
                                                            <button type="button" class="form-control supporting_document_for_approval" data-input="get_appendable_designation" placeholder="" id="" required="">ADD MORE</button>
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>

                                            

                                            <div class="col-sm-12">
                                                    <div class="form-group">


                                                            <label class="font-weight-bold mb-1">Input certifications information</label>
                                                            <input type="text" name="certifications_info" class="form-control" placeholder="Certifications information" >


                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Provide related certifications you posses as a practitioner</label>
                                                            <input type="file" name="certifications[]" class="form-control" placeholder="" >
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>

                                           

                                            <div class="col-sm-12 append_certification_div">
                                                
                                            </div>

                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="">
                                                            
                                                            <button type="button" class="form-control supporting_document_for_approval2" data-input="get_appendable_certification" placeholder="" id="">ADD MORE</button>

                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="next-button text-center mt-1 mb-3" data-current="first-screen" data-next="second-div"> <span class="fa fa-arrow-right"></span> </div>
                                    </div>
                                    <div class="card2 ml-2 second-div">
                                        <div class="row ">
                                           <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Location of Clinic</label>
                                                            <input type="text" name="location" class="form-control" id="point" placeholder="">
                                                            <div class="help-block"></div></div>
                                                            <input type="hidden" id="latitude" name="latitude">
                                                            <input type="hidden" id="longitude" name="longitude">
                                                    </div>
                                            </div>
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Add a CAPTION for your clinic</label>
                                                            <textarea class="form-control" name="caption" rows="4" placeholder="Add Caption"></textarea>
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label class="font-weight-bold mb-1">Add related AFFILIATIONS (e.g. Colleges you graduated from):</label>
                                                            <input type="text" name="affiliations" class="form-control" placeholder="">
                                                            <div class="help-block"></div></div>
                                                    </div>
                                            </div>

                                            <div class="next-button text-center mt-1 mb-3" data-current="second-div" data-next="third-div"> <span class="fa fa-arrow-right"></span> </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card2 third-div ml-2">
                                        <div class="row mb-4">
                                            
                                            <p class="font-weight-bold text-dark">
                                                You've reached the end of the registration process.<br><br>
                                                Once submitted, your profile will be under review pending approval. The approval process may take up to 24 hours. Please be patient as we work hard to provide you with a quick and seamless experience.
                                                <br><br>
                                                You can check out the 'Find A Homeopath' directory to get a better idea of how other practitioners are building and displaying their profiles.
                                            </p>

                                            <h6 class="col-12 mt-2 float-right"><button type="submit" class="bt btn-primary btn-lg border-0 ">Save</button></h6>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
    </form>
</div>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/post_registration.blade.php ENDPATH**/ ?>