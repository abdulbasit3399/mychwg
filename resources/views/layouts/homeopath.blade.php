
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <input type="hidden" name="csrf_token" id="csrf_token" value="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/data-list-view.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ijaboCrop/ijaboCropTool.min.css') }}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/icomoon/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/switch/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sidebar.css') }}">

     <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/inputTags.css') }}">
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="crossorigin="anonymous"></script> --}}
    <!-- END: Page CSS-->
    
    @yield('css')

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@php

$last = url()->current();
$split = explode("/", $last);

$text_name=$split[count($split)-1];

$text=$setting[$text_name.'-toast']??'';





@endphp
    <!-- toaster -->

@if($text)
    <div class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000" style="position: fixed; z-index:999999 ; top: 1rem; margin: 3% auto;left: 0;right: 0;">

        <div class="toast-body" style="font-size: 14px;">
        <div style="display: flex; padding: 5px 8px;">
            <i class="fa fa-info-circle" aria-hidden="true" style="background-color:#ffffff; color: black;font-size: 26px; margin-top: 1px;">
            </i>
             <span style="padding: 0px 15px;" class="toast-text">
                {{$text}}
             </span>
        </div>
        </div>
    </div>
@endif


    <!-- BEGIN: Navbar-->
    @include('homeopath.components.navbar')
    <!--End: Navbar-->

    <!-- BEGIN: Sidebar-->
    @include('homeopath.components.sidebar')
    <!-- END: Sidebar-->



    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">

                @if(Auth::User()->HomeopathProfile)
                    @yield('content')
                @else
                    @include('homeopath.post_registration')
                @endif

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

        @include('homeopath.homeopath_modals')



        @if(Route::is('homeopath.dashboard'))
            <a href="{{ route('get.more.badges') }}" class="report-float bg-dark" title="Learn How to Get More Badges?">
                <i class="fas fa-award"></i>
            </a>
        @endif

    <script src="{{ asset('admin/vendors/js/vendors.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('ijaboCrop/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{asset('admin/dropify/js/dropify.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('admin/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin/js/core/app.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts/ui/data-list-view.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/js/map_autocomplete.js') }}"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('admin/js/tag_input.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        showToastMessage()
    });
</script>
    <script>

        $(document).on('change','.booking_status_change',function(){


            var id=$(this).val();
            var status=$(this).find(':selected').data('status');



            $(this).closest('td').find('#appointment_status_change_form #hidden_appointment_id').val(id);
            $(this).closest('td').find('#appointment_status_change_form #hidden_appointment_status').val(status);

            var thiss=$(this);

                    swal({
                    title: 'Are you sure?',
                    text: 'Are you sure you want to cancel this appointment?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete)
                        {

                            if (status=='Y2FuY2VsbGVk')
                            {
                                $('#NoteModal').modal('show');
                            }
                            else
                            {
                                thiss.closest('td').find('#appointment_status_change_form').submit();
                            }

                                $(document).on('click','.submit_note_btn',function(){
                                    var note=$('#NoteModal').find('#note_textarea').val();
                                    thiss.closest('td').find('#appointment_status_change_form #hidden_appointment_note').val(note);
                                    thiss.closest('td').find('#appointment_status_change_form').submit();
                                })

                        }

                    });

                    return;
            // var text="Are you sure you want to do this action with this appointment ?";

        })

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('.sidebarCollapse,.navbar-collapse1').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    $(document).ready(function(){
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
        @if(session('message'))
            toastr.success("{{ session('message') }}");
        @elseif(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
        $('.dropify').dropify();
        $('.datatable').DataTable();
            $(".datepicker").datepicker({
               minDate: 0,
               format: 'yyyy-mm-dd',
            });
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





    <script>
        function showToastMessage()
        {

            var url =window.location.href;
             var parts = url.split("/");
            var last_part = parts[parts.length-1];
            last_part=last_part+'-toast';
            $('.toast').toast('show');
        }
        function anotherToast(text)
        {
            if ("{{$text_name}}"=='dashboard')
            {
                if (text != "")
                {
                    $('.toast-text').text('');
                    $('.toast-text').text(text);
                    $('.toast').toast('show');
                }

            }
            else{
                    // $('.toast-text').text('');
                    // $('.toast-text').text(text);
                    // $('.toast').toast('show');
                }
        }
    $(document).ready(function() {
        setTimeout(function() {
            var text = "";
             @if(!Session::has('zoom-toast'))
             text="{{$setting['zoom-toast']??''}}";
            @endif

            anotherToast(text);
          }, 8000);

        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                descriptionEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        $('input[name="registration_number"]').click(function(){
            @if(!Session::has('register-homeopath-toast'))
                    var text="{{$setting['register-homeopath-toast']??''}}";

                    anotherToast(text);
            @endif


        });
        $('input[name="thumbnail"]').click(function(){

          var text="{{$setting['services-upload-avatar-toast']??''}}";


            anotherToast(text);

        });
        $('input[name="caption"]').click(function(){

          var text="{{$setting['client-description-toast']??''}}";


            anotherToast(text);

        });
            $(document).on('click','.btn-add-service',function(){


                    var text="{{$setting['themes-toast']??''}}";


                    anotherToast(text);



        });
    });


        @php

            if(!Session::has('register-homeopath-toast'))
            {
                Session::put('register-homeopath-toast', true);
            }
            if(!Session::has('zoom-toast'))
            {
                Session::put('zoom-toast', true);
            }


        @endphp

</script>
<script type="text/javascript">

 //  function validate()
 //  {

 //            var valid = true;
 //            $(".validation-alert").remove();
 //            $(".required:visible").each(function () {

 //              if ($(this).val() == "" || $(this).val() === null) {
 //                $(this)
 //                  .closest("div")
 //                  .append('<div class="validation-alert text-danger font-weight-bold">This field is required</div>');
 //                valid = false;
 //              }
 //            });
 //            if (!valid) {
 //              $("html, .main-panel").animate(
 //                {
 //                  scrollTop: $(".validation-alert:first").offset().top-80,
 //                },
 //                100
 //              );
 //            }
 //        return valid;
 // }

$(document).ready(function(){

var current_fs, next_fs, previous_fs;

// No BACK button on first screen
if($(".show").hasClass("first-screen")) {
$(".prev").css({ 'display' : 'none' });
}

// Next button
$(".next-button").click(function(){

    var next_div=$(this).data('next');
    var current_div=$(this).data('current');

 // if (validate())
 // {


            $("."+current_div).removeClass("show");
            $("."+next_div).addClass("show");
            $("ul ."+next_div).addClass("active");

            $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

            $("."+current_div).animate({}, {
            step: function() {

            $("."+current_div).css({
            'display': 'none',
            'position': 'relative'
            });

            $("."+next_div).css({
            'display': 'block'
            });
            }
            });
 // }


});

// Previous button
$(".prev").click(function(){

current_fs = $(".show");
previous_fs = $(".show").prev();

$(current_fs).removeClass("show");
$(previous_fs).addClass("show");

$(".prev").css({ 'display' : 'block' });

if($(".show").hasClass("first-screen")) {
$(".prev").css({ 'display' : 'none' });
}

$("#progressbar li").eq($(".card2").index(current_fs)).removeClass("active");

current_fs.animate({}, {
step: function() {

current_fs.css({
'display': 'none',
'position': 'relative'
});

previous_fs.css({
'display': 'block'
});
}
});
});

});

$(document).on('click','.supporting_document_for_approval',function(){
    var input=$(this).data('input');
    var html=`<div class="form-group input-group">


                                                            <input type="file" name="edu_designation[]" class="form-control" placeholder="" ><i class="fa fa-trash remove-designation-btn" style="font-size: 25px;padding-left: 15px;padding-top: 5px;color: red;"></i>
                                                            <div class="help-block"></div>

                                                    </div>`;
    $('.append_designation_div').append(html)
});
$(document).on('click','.supporting_document_for_approval2',function(){
    var input=$(this).data('input');

    var html=`<div class="form-group input-group">


            <input type="file" name="certifications[]" class="form-control" placeholder="Certification" ><i class="fa fa-trash remove-designation-btn" style="font-size: 25px;padding-left: 15px;padding-top: 5px;color: red;"></i>
            <div class="help-block"></div>

    </div>`;

    $('.append_certification_div').append(html)
});
$(document).on('click','.remove-designation-btn',function(){

    $(this).closest('.form-group').remove();
})

</script>


    @yield('js')

</body>
<!-- END: Body-->

</html>
