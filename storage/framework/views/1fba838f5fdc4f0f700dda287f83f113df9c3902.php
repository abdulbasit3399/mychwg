<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="<?php echo e(asset($setting['favicon'])); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('front/assets/css')); ?>/form-wizard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/dropify/css/dropify.min.css')); ?>">
    <title><?php echo e(Auth::user()->name); ?> | Social Network - <?php echo e(env('APP_NAME')); ?></title>
  </head>
  <body>


<form action="<?php echo e(route('social.complete.step')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
      <div class="container-wizard">

        <div class="tab-content" id="pills-tabContent">
          <?php if(Auth::user()->role == 'user'): ?>

              <?php echo $__env->make('vendor.social-network.how-to-prompt.components.user_prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php elseif(Auth::user()->role == 'homeopath'): ?>

              <?php echo $__env->make('vendor.social-network.how-to-prompt.components.homeopath_prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php elseif(Auth::user()->role == 'advocate'): ?>

              <?php echo $__env->make('vendor.social-network.how-to-prompt.components.advocates_prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php else: ?>

            <script>
                window.location = "<?php echo e(route('redirect.dashboard')); ?>";
            </script>

          <?php endif; ?>


        </div>
</form>




    </div>



<div class="toast rounded-0" role="alert" aria-live="polite"  auto-hide="true" data-delay="6000">
  <div class="toast-header">
    <strong class="mr-auto">Hello, <?php echo e(Auth::user()->name); ?></strong>
  </div>
  <div class="toast-body bg-info text-white">
    <?php echo $message; ?>

  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalInviteHomeopath" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send an Invitation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="alert alert-warning">Enter Email Address below to send invitaiton to the concerend homeopath/people.<i class="far fa-smile"></i></h6>
        <input type="email" id="invitation-email" name="invitation-email" class="form-control username-input py-4" placeholder="johndoe@gmail.com">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-invitation" id="btn-invitation">Send Inivitation</button>
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?php echo e(asset('admin/dropify/js/dropify.min.js')); ?>"></script>

    <script>
      $(document).ready(function(){
        $('.dropify').dropify();
      })

      $('.toast').toast('show');


    </script>


    <script>
      $(document).on('keyup', '#connect_homeopath_id', function(){

          $value = $(this).val();
         $.ajax({
            type: 'GET',
            url: '<?php echo e(route('social.load.homeopath')); ?>?q='+$value,
            success: function (response) {
                if($value == '')
                {
                  $('#append-homeopath').html('');


                }
                else
                {
                  $('#append-homeopath').html(response);
                }
          }

        });
    })

          $(document).on('click', '.append-name', function(){
              $('#connect_homeopath_id').val($(this).text());
              $('#append-homeopath').html('');
          })


          $(document).on('click', '#btn-invitation', function(){

            $invitation_email = $('#invitation-email').val();

            if($invitation_email == "")
            {
              toastr.warning("Please enter invitation email address!");
              $('#invitation-email').focus();
            }

            $.ajax({
              type: 'GET',
              url: '<?php echo e(route('social.send.invitation')); ?>?email='+$invitation_email,
              success: function (response) {
                toastr.success(response);
                $('#modalInviteHomeopath').modal('hide');
                $('#connect_homeopath_id').val('').attr('disabled', true);
                $('#append-homeopath').html('');
            },
            error: function(response) {
               $.each(response.responseJSON.errors,function(field_name,error){
                    toastr.error(error);
                })
            }


          });


        })


    </script>

  </body>
</html>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/how_to_prompt.blade.php ENDPATH**/ ?>