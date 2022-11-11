<?php if(count($homeopath->HomeopathImages)>0): ?>
<div class="clearfix">
       <div class="float-left">
             <h4 class="mt-4">Photos</h4>
       </div>
       
   </div>

       <div class="row mt-2 slick_autoplay ml-4 mr-4">
           <?php $__currentLoopData = $homeopath->HomeopathImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="col-sm-3 showImage p-0 mx-1 "  data-count="<?php echo e($loop->iteration); ?>" data-toggle="modal" data-target="#viewOnePhoto">
                   <img data-toggle="" src="<?php echo e(asset($image->image)); ?>" >
               </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>

<?php endif; ?>

<div class="modal fade" id="viewAllPhotos" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header p-2">
         <h5 class="modal-title" id="exampleModalLongTitle">Photos</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

           <div class="row">
               <?php $__currentLoopData = $homeopath->HomeopathImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-sm-3 mb-3 mag">
                    <img data-toggle=""  src="<?php echo e(asset($image->image)); ?>">
                 </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </div>

       </div>
     </div>
   </div>
 </div>

 




<!-- Modal Resource Singal -->
<div class="modal fade" id="viewOnePhoto" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-zoom" role="document">
     <div class="modal-content">
       <div class="modal-body" >

           

            <div id="carouselExampleControls" class="carousel slide w-100" style="box-shadow: none !important;background: #ddd;" data-ride="carousel">
               <div class="carousel-inner py-2">
                   <?php $__currentLoopData = $homeopath->HomeopathImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="carousel-item <?php echo e($loop->iteration); ?> mag" >
                       <img class="d-block w-100 " data-toggle="" src="<?php echo e(asset($image->image)); ?>" style="object-fit:contain">
                   </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
               </a>
           </div>

       </div>
     </div>
   </div>
 </div>



<?php /**PATH C:\laragon\www\mychwg\resources\views/front/homeopath/includes/photos.blade.php ENDPATH**/ ?>