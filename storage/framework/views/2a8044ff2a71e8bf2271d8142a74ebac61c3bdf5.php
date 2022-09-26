<div class="col-lg-6 mb-3">

    <div class="card mt-5">

        <h5 class="m-0"><span class="text-white bg-info p-1 d-block">Form # 2</span></h5>

        <div class="card-body">

            

            <?php if($service->child_service_document != null): ?>

            <a href="<?php echo e(asset($service->child_service_document ?? '')); ?>" target="_blank" class="btn btn-dark btn-block">View Uploaded Form</a>

            <a

                href="<?php echo e(route('homeopath.settings.service.document.remove',

                ['form' => 2 ,'service' => base64_encode($service->id) ])); ?>"

                class="btn btn-danger btn-block mt-2 alert-confirm">

                Remove this Document

            </a>

            <?php else: ?>

                <form method="POST" action="<?php echo e(route('homeopath.settings.update.images')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="row main-item-images">



                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-2">



                            <input type="file" name="pdf" class="form-control mt-2" data-default-file="" data-allowed-file-extensions="pdf">

                            <input type="hidden" name="age_type" value="inner_doc">

                            <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">

                            <label class="mt-2">Title of Document</label>

                            <input type="text" class="form-control" name="service_document_inner_heading" value="<?php echo e($service->service_document_inner_heading ?? ''); ?>" >



                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-right">



                            <button type="submit" class="btn btn-success" href="#">Update Document</button>

                        </div>





                    </div>



                </form>

            <?php endif; ?>

            

        </div>

    </div>

</div>



<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/services/forms/form_2.blade.php ENDPATH**/ ?>