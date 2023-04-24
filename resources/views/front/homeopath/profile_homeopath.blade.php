@extends('layouts.front')
@section('title', $homeopath->name??'')
@section('css')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">

 <style>
 .v-box1 {
    display: flex !important;
    height: 65px !important;
    justify-content: space-between !important;
    line-height: 13px !important;

}
 </style>
@endsection
@section('content')

<header>
    <div class="wrapper">
        <div id="header_content" style="background:#dcf2fa 50% center;background-size: cover;">
            @include('front.components.navbar')
            <!--PAGE BANNER-->
        </div>
    </div>
</header>
<!--END HEADER-->

<section>

    <div class="container mt-5">

        <div class="row">
            <!--=====================================================-->
                       <!-- INCLUDE SOCIAL SIDEBAR CARD -->
            <!--=====================================================-->
            <div class="col-lg-2 col-md-12 col-12 col-sm-12 profile-sidebar m-0 p-0">
               @include('front.homeopath.includes.social_sidebar')
            </div>

            <!--=====================================================-->
                       <!-- INCLUDE PROFILE SIDEBAR -->
            <!--=====================================================-->
            <div class="col-lg-3 profile-sidebar" style="overflow: auto;">
               @include('front.homeopath.includes.features_sidebar')
            </div>

            <div class="col-lg-7 profile-right-sidebar">

                <!--=====================================================-->
                               <!-- INCLUDE SERVICES -->
                <!--=====================================================-->
                <div class="profile-services">
                    @include('front.homeopath.includes.services')
                </div>

                <!--=====================================================-->
                               <!-- INCLUDE MAP -->
                <!--=====================================================-->
                <div class="profile-map ">
                    <h4>Geographic Location</h4>
                    <div id="map" style="width: 100%; height: 300px;"></div>
                </div>

                <!--=====================================================-->
                               <!-- INCLUDE PHOTOS -->
                <!--=====================================================-->
                <div class="profile-photos mt-5">
                    @include('front.homeopath.includes.photos')
                </div>

                <!--=====================================================-->
                               <!-- INCLUDE TESTIMONIALS -->
                <!--=====================================================-->
                <div class="profile-testimonials mt-5">
                   @include('front.homeopath.includes.testimonials')
                </div>

                <!--=====================================================-->
                               <!-- INCLUDE RESOURCES -->
                <!--=====================================================-->
                <div class="profile-resources mt-5 mb-5">
                    @include('front.homeopath.includes.resources')
                </div>

            </div>
    </div>
</section>


        <!--=====================================================-->
                       <!-- BOOKING PROMPTS MODAL -->
        <!--=====================================================-->

            <div class="modal fade service_book_modal pr-0" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header p-2">
                      <div class="modal-title">
                          <h5 class="m-0 p-0 font-weight-bold">Book Service</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body service__prompts__data">
                    </div>
                  </div>
                </div>
              </div>

        <!--=====================================================-->
                       <!-- END BOOKING PROMPTS MODAL -->
        <!--=====================================================-->


<input type="hidden" id="service_price">
@endsection



@section('js')
<script>
 $(document).on('click','.showImage',function(){
     $('.carousel-item').removeClass('active');
     console.log('hello');
     let count = $(this).attr('data-count');

     $('.' + count).addClass('active');
 });
</script>


<script>
    $(document).on('click','.age__type',function(){
        var val=$(this).val();

        if (val=='adult') {

            $('.adult-form-download-btn').toggleClass('d-none');
            $('.child-form-download-btn').toggleClass('d-none');

            $('.adult-form-download-heading').toggleClass('d-none');
            $('.child-form-download-heading').toggleClass('d-none');

        }else{
            $('.adult-form-download-btn').toggleClass('d-none');
            $('.child-form-download-btn').toggleClass('d-none');
            $('.child-form-download-heading').toggleClass('d-none');
            $('.adult-form-download-heading').toggleClass('d-none');
        }

    });

    async function getCard()
    {
        const payments = Square.payments('{{$homeopath->square_app_id}}', '{{$homeopath->square_location_id}}');
        const card = await payments.card();
        await card.attach('#card-container');

        const cardButton = document.getElementById('card-button');
        cardButton.addEventListener('click', async () => {
          const statusContainer = document.getElementById('payment-status-container');

          try {
            const result = await card.tokenize();
            if (result.status === 'OK') {
              $('#square_tok').val(result.token);
              setTimeout(function (){$('#payment-form').submit()}, 200);
              
            } else {
              let errorMessage = `Tokenization failed with status: ${result.status}`;
              if (result.errors) {
                errorMessage += ` and errors: ${JSON.stringify(
                  result.errors
                )}`;
              }

              throw new Error(errorMessage);
            }
          } catch (e) {
            console.error(e);
            statusContainer.innerHTML = "Payment Failed";
          }
        });
    }

        $(document).on('click','.show-hide-caption',function(e){

            $('.caption__homeo__short').toggleClass('d-block d-none');
            $('.caption__homeo__long').toggleClass('d-block d-none');

        });

            $s_id = ""
        $(document).on('click','.book_btn',function(e){
            $self = $(this);
            $self.text('Loading...').attr('disabled', true);
            $s_id= $(this).data('service_id');

            // Call this function to send a payment token, buyer name, and other details
             // to the project server code so that a payment can be created with 
             // Payments API
             async function createPayment(token) {
               const body = JSON.stringify({
                 locationId,
                 sourceId: token,
               });
               const paymentResponse = await fetch('/payment', {
                 method: 'POST',
                 headers: {
                   'Content-Type': 'application/json',
                 },
                 body,
               });
               if (paymentResponse.ok) {
                 return paymentResponse.json();
               }
               const errorBody = await paymentResponse.text();
               throw new Error(errorBody);
             }

             // This function tokenizes a payment method. 
             // The ‘error’ thrown from this async function denotes a failed tokenization,
             // which is due to buyer error (such as an expired card). It is up to the
             // developer to handle the error and provide the buyer the chance to fix
             // their mistakes.
             async function tokenize(paymentMethod) {
               const tokenResult = await paymentMethod.tokenize();
               if (tokenResult.status === 'OK') {
                 return tokenResult.token;
               } else {
                 let errorMessage = `Tokenization failed-status: ${tokenResult.status}`;
                 if (tokenResult.errors) {
                   errorMessage += ` and errors: ${JSON.stringify(
                     tokenResult.errors
                   )}`;
                 }
                 throw new Error(errorMessage);
               }
             }

             // Helper method for displaying the Payment Status on the screen.
             // status is either SUCCESS or FAILURE;
             function displayPaymentResults(status) {
               const statusContainer = document.getElementById(
                 'payment-status-container'
               );
               if (status === 'SUCCESS') {
                 statusContainer.classList.remove('is-failure');
                 statusContainer.classList.add('is-success');
               } else {
                 statusContainer.classList.remove('is-success');
                 statusContainer.classList.add('is-failure');
               }

               statusContainer.style.visibility = 'visible';
             }    


            $.ajax({
            url: "{{ route('include.service.prompt') }}?service_id="+$s_id,
            success: function(response)
            {
                $('.service__prompts__data').html(response);
                $('#viewAllServices').modal('hide');

                $('.service_book_modal').modal('show').delay(3000).fadeIn();

                $('.service_book_modal').css('overflow', 'auto');


                dateTimeInt();
                $self.text('Book').attr('disabled', false);

            },
            complete: function(response)
            {
               getCard();
            }
            });


        })
    
            $.ajax({
            url: "{{ route('include.service.prompt') }}?service_id="+$s_id,
            success: function(response)
            {
                $('.service__prompts__data').html(response);
                $('#viewAllServices').modal('hide');
                $('.service_book_modal').modal('show');
                dateTimeInt();
                $self.text('Book').attr('disabled', false);

            },
            complete: function(response)
            {
                // stripeCheckout();
            }
            });



        $(document).on('click', '.age__type', function(){
            $('.download__form').attr('href', $(this).data('document'));
        });

        $(document).on('click', '.btn-toggle-badges', function(){
            $('#toggle-chevron-up-down').toggleClass('fa-chevron-down fa-chevron-up');
            $('.toggled-badge').toggleClass('d-none');
        });



</script>




<script type="text/javascript">

        $(document).on('click','.btn-read', function(){
            $('#viewAllResources').modal('hide');

            $('#resource_image').attr('src', $(this).data('src'));
            $('#resource-title').text($(this).data('title'));
            $('#resource-author').text($(this).data('author'));
            $('#resource-description').html($(this).data('description'));
            $('#resource-link').attr('src', $(this).data('link'));

            if($(this).data('pdf').length == 0)
            {
            $('#pdf').addClass('d-none');
            }
            else
            {
            $('#pdf').removeClass('d-none');
                $('#pdf').attr('href',$(this).data('pdf'))
            }


            $('#viewsingleResource').modal('show');
        })

    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    <script>
    $(document).on('click', '#card-button', function(){

    var value = $('.required-entry:visible').filter(function () {
    return this.value === '';
    });
    if (value.length == 0)
    {
    if($('#payment_method').val() == 'paypal' || $('#payment_method').val() == 'pay-later')
    {
    $('#payment-form').submit();
    }

    }
    else if (value.length > 0)
    {
    toastr.warning("Please fill out booking form fields.");
    return false
    }


    })



    $(document).on('click', '.modal-body .payments-tab .nav-link', function(){
    $('.modal-body #payment_method').val($(this).data('method'));
    })
    </script>





    <script>
            $('.modal-body #nav-detail').addClass('d-none');
            $('.modal-body #nav-payment').addClass('d-none');

        function dateTimeInt()
        {
        $(".modal-body #datep").find(".ui-state-active").removeClass("ui-state-active");

            $(".modal-body #datep").datepicker({
               minDate: 0,
               dateFormat:'yy-mm-dd',
               setDate: null
            }).on('change',function(e){

                $('#service_price').val($(this).data('service_price'));
                $('.search-slot-loader').toggleClass('d-none');
                $('.btn-payment-next').addClass('d-none');
                $input_service = $("input[name='input_service']:checked").val();
                $homeopath_id= $("input[name='input_service']:checked").data('homeopath-id');

                $('.service_id').val($input_service);

                $('#service_price').val($("input[name='input_service']:checked").data('service_price'));

                $('.input_date').val($(this).val());

                $.get("{{ route('get.service.slot') }}?service_id="+$input_service+'&date='+$(this).val(),'&homeopath_id='+$homeopath_id, function(response){

                  $('.booking-time-slot').html(response);
                  $('.search-slot-loader').toggleClass('d-none');
                  checkSlideOneValidity();

                  $('.btn-detail-next').addClass('d-none');

                });

        });
        }

        $(document).on('change',"input[name='time_slot']",function(){
            var thiss=$(this).val();
             $('.btn-detail-next').addClass('d-none');

            checkSlotAvailablity(thiss);
        })

        function checkSlotAvailablity(thiss)
        {

                $('.btn-detail-next').removeClass('d-none');

                $input_service = $("input[name='input_service']:checked").val();
                $homeopath_id= $("input[name='input_service']:checked").data('homeopath-id');

                var date_val=$('.input_date').val();



                $.get("{{ route('check.service.slot') }}?slot="+thiss+'&date='+date_val+'&service_id='+$input_service+'&homeopath_id='+$homeopath_id, function(response){


                  if (response) {
                    $('.btn-detail-next').removeClass('d-none');

                  }else{
                    $('.btn-detail-next').addClass('d-none');

                    toastr.success('This slot not match with the service duration time.')
                  }


                });
        }

        $(document).on('change', '.modal-body .input__paying__type', function(){


            if($(this).val() == 'pay_later')
            {
                $('.modal-body .payment-methods-btns').addClass('d-none');
                $('.modal-body #pills-later-tab').click();
            }
            else
            {
                $('.modal-body .payment-methods-btns').removeClass('d-none');
                $('.modal-body #pills-home-tab').click();
            }

        })


    </script>

    <script>
      $(document).on('keyup', '.input-health-concern', function(){

          if($(this).val() != "")
          {
            $('.btn-payment-next').removeClass('d-none');
          }
          else
          {
            $('.btn-payment-next').addClass('d-none');
          }



      })
    </script>
    <script>
        function checkSlideOneValidity() {
            $next_btn = $('.btn-detail-next');

            if ($(':radio[name=time_slot]', '.booking-time-slot').length)
            {
                $disabled_length = $('.disabled-radio', '.booking-time-slot').length;
                $total_slots =  $('input', '.booking-time-slot').length;

                $disabled_length < $total_slots ? $next_btn.removeClass('d-none') : $next_btn.addClass('d-none');



            }
            else
            {
                $next_btn.addClass('d-none');
            }


        }


        $(document).on('change', '.modal-body .timeInput input', function() {

            $('.timeInput input').removeClass('.select_time');
            $(this).closest('.col-sm-4').find('.timeinput').addClass('.select_time');
          $('.modal-body .btn-detail-next').removeClass('d-none');

        })

        $(document).on('change', '.modal-body .input_service', function() {

            $('.modal-body .booking-time-slot').html('');
            $('.modal-body .btn-detail-next').addClass('d-none');

        })
        $(document).on('click', '.modal-body .btn-detail-next', function() {
            $('.modal-body #nav-home').addClass('d-none');
            $('.modal-body #nav-detail').addClass('active show');
            $('.modal-body #nav-detail').removeClass('d-none');
            // $('.modal-body #nav-detail .btn-payment-next').addClass('active show');
        })
        $(document).on('click', '.modal-body .continue_back_btn', function() {
            $('.modal-body #nav-home').removeClass('d-none');
            $('.modal-body #nav-home').addClass('active show');
            $('.modal-body #nav-detail').removeClass('active show');
            $('.modal-body #nav-detail').addClass('d-none');

        })

        $(document).on('click', '.modal-body .continue_btn', function() {
            $('.modal-body #nav-detail').removeClass('active show');
            $('.modal-body #nav-detail').addClass('d-none');
            $('.modal-body #nav-payment').addClass('active show');
            $('.modal-body #nav-payment').removeClass('d-none');
        })
        $(document).on('click', '#card-button-back', function() {
            $('.modal-body #nav-detail').addClass('active show');
            $('.modal-body #nav-detail').removeClass('d-none');
            $('.modal-body #nav-payment').removeClass('active show');
            $('.modal-body #nav-payment').addClass('d-none');
        })

        // function checkboxMetting(thiss) {

        //     if (thiss=='Offline')
        //     {
        //         $('#meeting_handled_via_online').attr('checked',false);
        //         $('#meeting_handled_via_offline').attr('checked',true);
        //     }
        //     if (thiss=='Online')
        //     {

        //         $('#meeting_handled_via_offline').attr('checked',false);
        //         $('#meeting_handled_via_online').attr('checked',true);

        //     }


        // }




    </script>


<script>
$(document).ready(function() {
       google.load("maps", "3.exp", {
         callback: initMaps,
         other_params: 'key=AIzaSyCVwpL3ta3ApX5weM8ETTHklnSG0WeC3b0&libraries=places,drawing'
       });
     })
var map;

function initMaps() {
    var latitude = {{ $homeopath->HomeopathProfile->latitude??'' }}; // YOUR LATITUDE VALUE
    var longitude = {{ $homeopath->HomeopathProfile->longitude??'' }}; // YOUR LONGITUDE VALUE

    var myLatLng = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 14
    });

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      //title: 'Hello World'

      // setting latitude & longitude as title of the marker
      // title is shown when you hover over the marker
      title: latitude + ', ' + longitude
    });
}
</script>


<script>
    /*
Credits:
https://github.com/marcaube/bootstrap-magnify
*/


!function ($) {

    "use strict"; // jshint ;_;


    /* MAGNIFY PUBLIC CLASS DEFINITION
     * =============================== */

    var Magnify = function (element, options) {
        this.init('magnify', element, options)
    }

    Magnify.prototype = {

        constructor: Magnify

        , init: function (type, element, options) {
            var event = 'mousemove'
                , eventOut = 'mouseleave';

            this.type = type
            this.$element = $(element)
            this.options = this.getOptions(options)
            this.nativeWidth = 0
            this.nativeHeight = 0

            this.$element.wrap('<div class="magnify" \>');
            this.$element.parent('.magnify').append('<div class="magnify-large" \>');
            this.$element.siblings(".magnify-large").css("background","url('" + this.$element.attr("src") + "') no-repeat");

            this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
            this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
        }

        , getOptions: function (options) {
            options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

            if (options.delay && typeof options.delay == 'number') {
                options.delay = {
                    show: options.delay
                    , hide: options.delay
                }
            }

            return options
        }

        , check: function (e) {
            var container = $(e.currentTarget);
            var self = container.children('img');
            var mag = container.children(".magnify-large");

            // Get the native dimensions of the image
            if(!this.nativeWidth && !this.nativeHeight) {
                var image = new Image();
                image.src = self.attr("src");

                this.nativeWidth = image.width;
                this.nativeHeight = image.height;

            } else {

                var magnifyOffset = container.offset();
                var mx = e.pageX - magnifyOffset.left;
                var my = e.pageY - magnifyOffset.top;

                if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                    mag.fadeIn(100);
                } else {
                    mag.fadeOut(100);
                }

                if(mag.is(":visible"))
                {
                    var rx = Math.round(mx/container.width()*this.nativeWidth - mag.width()/2)*-1;
                    var ry = Math.round(my/container.height()*this.nativeHeight - mag.height()/2)*-1;
                    var bgp = rx + "px " + ry + "px";

                    var px = mx - mag.width()/2;
                    var py = my - mag.height()/2;

                    mag.css({left: px, top: py, backgroundPosition: bgp});
                }
            }

        }
    }


    /* MAGNIFY PLUGIN DEFINITION
     * ========================= */

    $.fn.magnify = function ( option ) {
        return this.each(function () {
            var $this = $(this)
                , data = $this.data('magnify')
                , options = typeof option == 'object' && option
            if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    $.fn.magnify.Constructor = Magnify

    $.fn.magnify.defaults = {
        delay: 0
    }


    /* MAGNIFY DATA-API
     * ================ */

    $(window).on('load', function () {
        $('[data-toggle="magnify"]').each(function () {
            var $mag = $(this);
            $mag.magnify()
        })
    })

} ( window.jQuery );
</script>


<script>


$(document).ready(function(){
    $('.slick_autoplay').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  // autoplay: true,
  autoplaySpeed: 1000,
  infinite:true
});

});


</script>


@endsection
