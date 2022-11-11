
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(env('APP_NAME')); ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset($setting['favicon'] ?? '')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/menu/menu-types/horizontal-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/custom.css')); ?>">
    <style type="text/css">
        .custom-toast
        {
                background-color: #ffffff;
                color: #000;
                border: none;
                box-shadow: 0 0.25rem 0.75rem rgb(34 41 47 / 15%);
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

<?php

$last = url()->current();
$split = explode("/", $last);

$text_name=$split[count($split)-1];

$text=$setting[$text_name.'-toast']??'';



?>
    <!-- toaster -->

<?php if($text): ?>
    <div class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000" style="position: fixed; z-index:999999 ; top: 1rem; margin: 3% auto;left: 0;right: 0;">

        <div class="toast-body" style="font-size: 14px;">
        <div style="display: flex; padding: 5px 8px;">
            <i class="fa fa-info-circle" aria-hidden="true" style="background-color:#ffffff; color: black;font-size: 26px; margin-top: 1px;">
            </i>
             <span style="padding: 0px 15px;" class="toast-text">
                <?php echo e($text); ?>

             </span>
        </div>
        </div>
    </div>
<?php endif; ?>

    <!-- BEGIN: Navbar-->
    <?php echo $__env->make('user.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--End: Navbar-->


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">

                <?php echo $__env->yieldContent('content'); ?>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



<div class="modal fade bg-dark" id="modalDonation" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body text-center">
        <h2 class="font-weight-bold" style="color:#ccc">Hello! <?php echo e(Auth::user()->name); ?></h2>
        <h3 class="alert alert-info font-weight-bold rounded-0">This notification is for informing you to donate your monthly donation of
            <span class="text-success" style="font-size: 3rem;">$<?php echo e(checkMonthlyDonation(Auth::id())->price ?? ''); ?></span> <br>If want to donate click <span class="text-dark">"Continue"</span> button otherwise click <span class="text-danger">"Cancel"</span> button.</h3>


            <div class="row">
                <div class="col-sm-6">
                    <form action="<?php echo e(route('donate.amount')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="price" value="<?php echo e(checkMonthlyDonation(Auth::id())->price ?? ''); ?>">
                        <input type="hidden" name="payment_type" value="monthly">
                        <button type="submit" class="btn btn-dark font-weight-bold btn-block">Continue</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo e(route('donation.cancel', Crypt::encrypt(checkMonthlyDonation(Auth::id())->id ?? ''))); ?>" class="btn btn-danger btn-block font-weight-bold alert-confirm">Cancel</a>
                </div>
            </div>




        <small class="d-block" style="color:#ccc;padding-top: 5px;"><strong>NOTE:</strong> If you cancel/continue this notification will not show again. Donation is totally on up to you and your choice to pay or not. Want to learn more about donation click
            <a target="_blank" href="<?php echo e(route('donations.index')); ?>" class="font-weight-bold">here</a></small>
      </div>
    </div>
  </div>
</div>


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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="<?php echo e(asset('admin/js/map_autocomplete.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/tag_input.js')); ?>"></script>
    <script>

    $(document).ready(function(){

        <?php if(checkMonthlyDonation(Auth::id()) != ""): ?>
            $('#modalDonation').modal('show');
        <?php endif; ?>


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
        $('.dropify').dropify();
    </script>
    <script type="text/javascript">
        $(function() {
    $('#form-tags-1').tagsInput();

    $('#form-tags-2').tagsInput({
        'onAddTag': function(input, value) {
            console.log('tag added', input, value);
        },
        'onRemoveTag': function(input, value) {
            console.log('tag removed', input, value);
        },
        'onChange': function(input, value) {
            console.log('change triggered', input, value);
        }
    });

    $('#form-tags-3').tagsInput({
        'unique': true,
        'minChars': 2,
        'maxChars': 10,
        'limit': 5,
        'validationPattern': new RegExp('^[a-zA-Z]+$')
    });

    $('#form-tags-4').tagsInput({
        'autocomplete': {
            source: [
                'apple',
                'banana',
                'orange',
                'pizza'
            ]
        }
    });

    $('#form-tags-5').tagsInput({
        'delimiter': ';'
    });

    $('#form-tags-6').tagsInput({
        'delimiter': [',', ';']
    });
});


    </script>
    <script type="text/javascript">
        function showToastMessage()
        {

            var url =window.location.href;
             var parts = url.split("/");
            var last_part = parts[parts.length-1];
            last_part=last_part+'-toast';


            // $('.toast-text').text('');
            // var text="<?php echo e($setting['dashboard-toast']??''); ?>"
            // $('.toast-text').text(text);
            $('.toast').toast('show');
        }
        $(document).ready(function(){

            showToastMessage()
        });
    </script>

    <?php echo $__env->yieldContent('js'); ?>

</body>
<!-- END: Body-->

</html>
<?php /**PATH C:\laragon\www\mychwg\resources\views/layouts/user.blade.php ENDPATH**/ ?>