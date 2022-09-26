<?php $__env->startSection('title', 'Explore Homeopathy'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('front.components.pages_banner', ['heading' => 'Explore Homeopathy', 'description' => 'Explore our resource library and find out about Homeopathy'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>








<!--MAIN CONTENT SECTION-->
<section class="content">
    <div id="custom_single_page">
        
        <!-- Tab panes -->

        <div class="container-fluid px-0">
            <div class="row">

                    <div class="col-sm-3">
                        <div class="explore-bar">
                            <div class="sidebar left">

                                    
                                    <ul class="list-sidebar bg-defoult">

                                        <?php $__currentLoopData = $homeopath_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li style="border-bottom:1px solid;font-size: 15px;">
                                                <a href="#" data-toggle="collapse" data-target="#<?php echo e($category->id); ?>" area-expanded="true" class="collapsed" >
                                                    <span class="nav-label"> <?php echo e($category->title); ?> </span> 
                                                </a>

                                                <ul class="sub-menu collapse show" id="<?php echo e($category->id); ?>">
                                                    <?php $__currentLoopData = $category->homeopathLibraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <li><a href="#" class="btn__library" data-id="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                      
                                    </ul>
                            </div>

                        </div>
                    </div>

                <div class="col-sm-9">
                    <div class="p-4 append__result"></div>
                </div>


            </div>
        </div>
        <div class="banner-bottom  text-center">
            <div class="inner">
                <h2>Looking for more information? Join Materia.</h2>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).on('click', '.main-catalog a', function(){
            $('.child-catalog-sections').find('.tab-pane').removeClass('active');
            $('.child-catalog-sections').find('.nav-link ').removeClass('active');
        })

        $(document).on('click', '.btn__library', function(e){
               e.preventDefault();
            $id = $(this).data('id');
            $.get("<?php echo e(route('explore.homeopathy.detail')); ?>?id="+$id, function(response){

                $('.append__result').html(response);
            });
        })
            
        $(document).ready(function(){
            $(".btn__library").first().click();
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/explore_homeopathy.blade.php ENDPATH**/ ?>