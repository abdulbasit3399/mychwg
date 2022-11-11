<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(env('APP_NAME')); ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset($setting['favicon'] ?? '')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/toastr.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/vendors.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/tether-theme-arrows.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/tether.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/themes/semi-dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/dropify/css/dropify.min.css')); ?>">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/custom.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets')); ?>/plugins/icheck/square/purple.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn
        {
            border-radius: 0px;
        }
    </style>
    <!-- END: Page CSS-->
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-expanded footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Navbar-->
    <?php echo $__env->make('admin.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--End: Navbar-->

    <!-- BEGIN: Sidebar-->
    <?php echo $__env->make('admin.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END: Sidebar-->



    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper mt-2">
            <div class="content-body">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <script src="<?php echo e(asset('admin/vendors/js/vendors.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/tables/datatable/datatables.checkboxes.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/dropify/js/dropify.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/vendors/js/extensions/tether.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/core/app.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/scripts/components.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/scripts/ui/data-list-view.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('front/assets')); ?>/plugins/icheck/icheck.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function(){
        $('.select2').select2({
            width:'100%',
        });
        var deleteID = document.querySelectorAll(".alert-confirm");
        deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("href");
                swal({
                    title: 'Are you sure?',
                    text: 'You want be to do this?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = $url;
                    }

                    });
            });
            });
        });
    </script>
    <script>
       	<?php if(session('message')): ?>
            toastr.success("<?php echo e(session('message')); ?>");
        <?php elseif(session('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if($errors->any()): ?>
            toastr.error("<?php echo e(implode(' ', $errors->all())); ?>");
        <?php endif; ?>


        $('.dropify').dropify();


        $('.datatable').DataTable({
            "ordering":false
        });

    </script>
    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 400
      });
      $('.small-summernote').summernote({
        tabsize: 2,
        height: 100,
        toolbar: [['style', ['bold', 'italic', 'underline']],]
      });
    </script>


    <?php echo $__env->yieldContent('js'); ?>

</body>
<!-- END: Body-->

</html>
<?php /**PATH C:\laragon\www\mychwg\resources\views/layouts/admin.blade.php ENDPATH**/ ?>