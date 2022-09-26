<div class="col-lg-6 mb-3">

    <div class="card">

        <h5 class="m-0"><span class="text-white bg-info p-1 d-block">Form # 4</span></h5>

        <div class="card-body">

            

            <?php if($service->service_document_4_path != null): ?>

                <a href="<?php echo e(asset($service->service_document_4_path??'')); ?>" target="_blank" class="btn btn-dark btn-block">View Uploaded Form</a>

                <a

                    href="<?php echo e(route('homeopath.settings.service.document.remove',

                    ['form' => 4 ,'service' => base64_encode($service->id) ])); ?>"

                    class="btn btn-danger btn-block mt-2 alert-confirm">

                    Remove this Document

                </a>

            <?php else: ?>

                <form method="POST" action="<?php echo e(route('homeopath.settings.update.additional.documents')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="service_id" value="<?php echo e(Crypt::encrypt($service->id)); ?>">

                    <div class="row main-item-images">



                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-2">

                            <input type="file" name="service_document_4_path" class="form-control mt-2" data-default-file="" data-allowed-file-extensions="pdf">

                            <label class="mt-2">Title of Document</label>

                            <input type="text" class="form-control" name="service_document_4_heading" required value="<?php echo e($service->service_document_4_heading ?? ''); ?>" >



                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-right">

                            <button type="submit" class="btn btn-success" href="#">Update Document</button>

                        </div>





                    </div>



                </form>

            <?php endif; ?>

            

        </div>

    </div>

</div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/services/forms/form_4.blade.php ENDPATH**/ ?>