@extends('layouts.front')

@section('title', 'IHWG for Homeopath')



@section('css')

  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style type="">

  .appointment-banner {

    background-size: cover;

    border-radius: 20px;

    font-weight: bold;

    color: var(--apt-booking-color);

    margin: 0px 24px !important;

  }

</style>

@endsection



@section('content')

<header>

    <div class="wrapper">

        <div id="header_content" style="background:#dcf2fa url({{ asset('front/assets') }}/templates-assets/header/img/vancouver.jpg) no-repeat 50% center;background-size: cover;">

            @include('front.components.navbar')

        </div>

    </div>

</div>

</header>

<!--END HEADER-->

<!--MAIN CONTENT SECTION-->

<section class="content">



    <div class="container container-book-appointment mb-4">

      <div class="appointment-banner p-5" style="background-image:url('{{ asset($service->ServiceTheme->cover) }}')">

        <h2>Book an Appointment</h2>

        <p>Book an available time-slot for a selected service</p>

        <p>Thank you!</p>

      </div>

      <div class="row px-4">











        @foreach(Auth::user()->HomeopathServices as $item)



          <div class="col-lg-6 mb-3">

            <div class="inputGroup disabled-radio">

              <input id="service__{{ $loop->iteration }}" class="input_service" name="input_service" value="{{ $service->id }}" type="radio" @if($item->id == $service->id) checked="" @endif />

              <label for="service__{{ $loop->iteration }}">

                <h5 class="mb-4">{{ $item->title }}</h5>

                <span>{{ $item->duration }} minutes</span>

              </label>

            </div>

          </div>



        @endforeach





      </div>

      <form id="payment-form" method="POST" action="{{ route('homeopath.services.appointment.create') }}">

        @csrf

        <input type="hidden" name="service_id" value="{{ Crypt::encrypt($service->id) }}">

        <div class="row p-4">

          <div class="col-lg-12">

            <strong>Select Date & Time</strong>

          </div>

          <div class="col-lg-6 mt-2">

            <input type="hidden" name="date" class="input_date" required="">

            <!-- <input type="hidden" name="homeopath_id" class="homeopath_id" value="{{Auth::id()}}"> -->

            <span type="text" id="datep" class="date-pick"></span>

          </div>

          <div class="col-lg-6 mt-2">

            <div class="card card-time">

              <div class="card-body">



                <div class="row booking-time-slot"></div>



                <div class="search-slot-loader d-none">

                     <i class="fas fa-circle-notch fa-spin fa-5x"></i>

                </div>



              </div>

            </div>



          </div>



          <div class="col-lg-12 mt-3 mb-3 pr-0">

            <!-- <strong>Select member for appointment</strong>

              <select class="form-control select2" name="user_id">

                 @foreach($users as $item)

                    <option value="{{ Crypt::encrypt($item->id) }}">{{ $item->name }} | {{ $item->email }} | {{ $item->role }}</option>

                 @endforeach

              </select> -->





             <strong>Select Patient From Existing Customers</strong>

              <select class="form-control select2" name="user_id">

                <option value="" selected>Select Patient From Existing Customers</option>

                 @foreach($users as $item)

                    <option value="{{ Crypt::encrypt($item->id) }}">{{ $item->name }} | {{ $item->email }}</option>

                 @endforeach

              </select>

          </div>

          <div class="col-sm-12 text-center my-4 pt-1"><h5>OR</h5></div>

          <div class="col-md-4">

            <strong>Input Name of the Patient</strong>

            <input type="text" name="patient_name" placeholder="Enter Patient Name" class="form-control">

          </div>

          <div class="col-md-4">

            <strong>Input Email of the Patient</strong>

            <input type="text" name="patient_email" placeholder="Enter Patient Email" class="form-control">

          </div>



          <div class="col-md-4">

            <strong>Input Number for the Patient</strong>

            <input type="text" name="patient_phone" placeholder="Enter Patient Phone" class="form-control">

          </div>





          <div class="col-lg-12 text-right mt-4 btn-detail-next d-none">

            <div class="nav nav-tabs float-right">

                <button class="btn btn-primary" type="submit">Set Appointment</button>

            </div>

          </div>





        </div>



      </div>



  </form>



</section>

@endsection

@section('js')

    <script type="text/javascript">

    $(document).ready(function() {

        $('.select2').select2();

    });





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







    $(document).on('click', '.payments-tab .nav-link', function(){

    $('#payment_method').val($(this).data('method'));

    })

    </script>


    













    <script>





        $("#datep").datepicker({

               minDate: 0,

               dateFormat:'yy-mm-dd',

               setDate: null,

            }).on('change',function(e){



                $('.search-slot-loader').toggleClass('d-none');

                $input_service = $("input[name='input_service']:checked").val();



                $('.input_date').val($(this).val());



                $.get("{{ route('get.service.slot') }}?service_id="+$input_service+'&date='+$(this).val(), function(response){



                  $('.booking-time-slot').html(response);

                  $('.btn-detail-next').removeClass('d-none');

                  $('.search-slot-loader').toggleClass('d-none');

                  checkSlideOneValidity();



                });



        });







        $("#datep").find(".ui-state-active").removeClass("ui-state-active");





        $(document).on('change', '.input__paying__type', function(){





            if($(this).val() == 'pay_later')

            {

                $('.payment-methods-btns').addClass('d-none');

                $('#pills-later-tab').click();

            }

            else

            {

                $('.payment-methods-btns').removeClass('d-none');

                $('#pills-home-tab').click();

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



            $next_btn = $('.btn-detail-next').addClass('d-none');



            // if ($(':radio[name=time_slot]', '.booking-time-slot').length)

            // {

            //     $disabled_length = $('.disabled-radio', '.booking-time-slot').length;

            //     $total_slots =  $('input', '.booking-time-slot').length;



            //     $disabled_length < $total_slots ? $next_btn.removeClass('d-none') : $next_btn.addClass('d-none');



            // }

            // else

            // {

            //     $next_btn.addClass('d-none');

            // }





        }



        $(document).on('click', ':radio[name=time_slot]', function(){



            if($(this).is(':checked'))

            {

                $('.btn-detail-next').removeClass('d-none');

            }

            else

            {

                $('.btn-detail-next').addClass('d-none');

            }



        })



    </script>





@endsection

