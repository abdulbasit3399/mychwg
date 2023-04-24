@extends('layouts.front')
@section('title', 'Find A Homeopath')

@section('css')

<style>

</style>


@endsection

@section('content')
<style type="text/css">
  .gm-style-iw{
    max-width: 300px !important;
  }
</style>
<header>
  <div class="wrapper">
    <div id="header_content" style="background-image: url('{{ asset('front/assets/templates-assets/header/img/hbg.jpg') }}');background-size: cover;">
      @include('front.components.navbar')

      <!--PAGE BANNER-->
      <div class="banner-box pt-1">
        <div class="banner-top text-center">

          <div class="">

            <form method="get" action="">
              <div class="input-group search-homeopath-box">
                <input type="text" class="form-control" name="q" placeholder="Search by Name" value="{{ $req->q ?? '' }}">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>

            <h5 class="text-dark pt-2">Don't know a homeopath? Find one...</h5>
            <button class="btn btn-primary mt-1"  data-toggle="modal" data-target="#browseBySpecialization">Browse by Focuses</button>

          </div>
        </div>
      </div>

    </div>
  </div>
</header>
<!--END HEADER-->

<!--MAIN CONTENT SECTION-->
<section class="border d-flex justify-content-center mb-1" id="go__down">
  <div class="container-fluid px-0">
    @if($req->specialization)
    <div class="row mt-3 px-2">
      <div class="col-sm-6">
        <h5>About <span class="text-success font-weight-bold">{{ count($homeopaths) }}</span> result(s) found for
          <span class="font-weight-bold text-success">{{ $req->specialization ?? '' }}</span>
        </h5>
      </div>
      <div class="col-sm-6 text-right">
        <h5>Filter type: <span class="font-weight-bold text-success">Focuses</span></h5>
      </div>
    </div>
    <hr>
    @endif

    @if($req->q)
    <div class="row mt-3 px-2">
      <div class="col-lg-6">
        <h5>About <span class="text-success font-weight-bold">{{ count($homeopaths) }}</span> result(s) found for
          <span class="font-weight-bold text-success">{{ $req->q ?? '' }}</span>
        </h5>
      </div>
      <div class="col-lg-6 text-right">
        <h5>Filter type: <span class="font-weight-bold text-success">Name Search</span></h5>
      </div>
    </div>
    <hr>
    @endif

    <div id="vendors_list">
      <div class="row">

        <div class="col-lg-9 mt-5">


          <div class="row px-2">
            @foreach($homeopaths as $item)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-4">
              <div class="vendors-list-content">
                <div class="pr" style="position: absolute; top: -13%; left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%);">
                  <span class="v-tag"></span>
                  <div class="vendors-list-profile-image">
                    <img src="{{ asset($item->avatar) }}">
                  </div>
                </div>
                <div class="vendors-list-profile-details mt-4 pt-3">
                  <div class="vendor-name">
                    <h4 class="font-weight-bold mb-0 pb-0">
                      <a href="{{ route('profile.homeopath', $item->user_name) }}">{{ $item->name }}</a></h4></div>
                  <div class="text-center vendor-address txt14 font-weight-bold" style="color:#10E8CB;">
                    {{ $item->HomeopathProfile->designation }}
                  </div>

                  <div class="info mt-3">
                    <hr class="my-1">
                    <h6 class="font-weight-bold text-success browse-card-email"><i class="fas fa-envelope fa-1x"></i> {{ $item->email ?? 'N/A' }}</h6>
                    <hr class="my-1">
                    <h6 class="font-weight-bold text-info browse-card-phone"><i class="fas fa-phone fa-1x"></i> {{ $item->phone ?? 'N/A' }}</h6>
                    <hr class="my-1">
                    <small class="font-weight-bold"><i class="fas fa-calendar-alt fa-1x"></i> {{ $item->created_at->format('M d, Y') }}</small>
                    <hr class="my-1">
                    <div class="font-weight-bold" style="height:36px;font-size: 13px;">
                      <i class="fas fa-map fa-1x"></i>
                      <a class="text-dark" target="_blank" href="https://maps.google.com/?q={{ $item->HomeopathProfile->location ?? '' }}">
                        {{ $item->HomeopathProfile->location ?? '' }}
                      </a>
                    </div>
                    <hr class="my-1">

                  </div>


                  <div class="v-box1 mt-3">

                    @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Badge")=='true')
                    <div class="item">

                      <img src="{{ asset(badge($item->badge)['path']) }}"  class="profile-bowl1 h-100 1"
                      data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="{{ badge($item->badge)['title'] }}" >
                    </div>
                    @endif

                    @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Booking Milestone")=='true' && count(getHomeopathBookings($item->id)) >= 0)
                    @php
                      $modulas = 0;
                      if((count(getHomeopathBookings($item->id)) % 5) == 0)
                        $modulas = count(getHomeopathBookings($item->id));
                      else
                        $modulas = count(getHomeopathBookings($item->id)) - (count(getHomeopathBookings($item->id)) % 5);

                    @endphp
                    <div class="item2 ">
                      <div>
                       <img src="{{ asset('uploads/badges/bookings_25.png') }}"class="profile-bowl mb-2" style="width:76px !important" ><br/>
                       <span style="font-size:7px;font-weight: 700;color: black;">
                        {{$modulas}} BOOKINGS
                      </span>
                     </div>
                   </div>
                   @endif
                   @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Years")=='true')

                   <div class="item3">
                    <div>

                      @if($item->HomeopathProfile->created_at->diffInMonths() >= 12)
                      <img src="{{ asset('uploads/badges/year_1.png') }}"  class="profile-bowl"
                      data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top" >
                      @elseif($item->HomeopathProfile->created_at->diffInMonths() > 0)
                      <span class="txt9" style="font-size:12px" >
                        {{ $item->HomeopathProfile->created_at->diffForHumans() }} </span>
                        @else
                        <img src="{{ asset('uploads/badges/grand_opening.png') }}"  class="profile-bowl"
                        data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                        @endif
                      </div>

                    </div>
                    @endif

                  </div>
                </div>
                <hr class="my-2">
                <div class="btn-group w-100 homeo-profile-buttons">
                  {{-- <a class="btn btn-connect btn-primary m-0 btn-block" data-id="{{ Crypt::encrypt($item->id) }}">
                    @if(checkUserFollowing(Auth::id(), $item->id) > 0)
                    Unfollow
                    @else
                    Follow
                    @endif
                  </a> --}}
                  <a href="{{ route('profile.homeopath', $item->user_name) }}" class="btn btn-success m-0 btn-block">Enter Clinic</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>


          <div class="text-center">
            {{ $homeopaths->appends($data)->links() }}
          </div>

        </div>


        <div class="col-lg-3 px-0 map__grid p-0">
          <div id="map" style="width: 100%; height: 100vh;"></div>
        </div>



      </div>
    </div>
  </div>
</section>




<!-- MODAL SPECIALIZATION -->
<div class="modal fade" id="browseBySpecialization" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Homeopath Focuses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="get" action="">

        <div class="modal-body">

          <div class="row px-2">
            @foreach($specializations as $key => $value)
            <div class="col-lg-4 mb-1 p-1">
              <div class="inputGroup">
                <input id="illnesses{{ $key }}" class="required-entry" name="specialization" value="{{ $value }}" type="radio" />
                <label for="illnesses{{ $key }}">
                  <span>{{ $value }}</span>
                </label>
              </div>
            </div>

            @endforeach
          </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm px-4 py-2"><i class="fas fa-filter"></i> Apply Filter</button>
        </div>
      </form>

    </div>
  </div>
</div>




@include('front.components.filter_canvas_sidebar')


@endsection



@section('js')
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>



<script>

  $(window).scroll(function(e){
    var $el = $('.map__grid');
    // var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 310 ){
    // $el.css({'position': 'fixed', 'top': '0px;', 'right': '0px','margin-right':'-8px'});
  }
  if ($(this).scrollTop() < 310){
    // $el.css({'position': 'static', 'top': '0px'});
  }
});






  var mp;
  var markers = [];


  function initMaps() {

    var latitude = 45.424721; // YOUR LATITUDE VALUE
    var longitude = -75.695000; // YOUR LONGITUDE VALUE

    var myLatLng = {lat: latitude, lng: longitude};



    google.maps.event.addDomListener(window, 'load');

    var epoint = document.getElementById('point');
    var autocomplete1 = new google.maps.places.Autocomplete(epoint, {
      loc: ['geocode'],
      componentRestrictions: { country: 'ca' }
    });



    google.maps.event.addListener(autocomplete1, 'place_changed', function() {
      var place = autocomplete1.getPlace();
      $('#latitude').val(place.geometry['location'].lat());
      $('#longitude').val(place.geometry['location'].lng());
    });



    mp = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 3
    });


    var infoWindow = new google.maps.InfoWindow();
    @foreach($homeopaths as $item)
    var marker = new google.maps.Marker({
      position:  new google.maps.LatLng( {{ $item->HomeopathProfile->latitude ?? '' }} , {{ $item->HomeopathProfile->longitude ?? '' }}),
      map: mp,
      icon: 'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_blue.png'
    });

    var html_infowindow = `<div class="row card-shop marker-pop" data-href="{{ route('profile.homeopath', $item->user_name) }}">
      <div class="col-sm-4 p-0 ">
        <img src="{{ asset($item->avatar) }}" style="float:right;" class="mr-2">
        
      </div>
      <div class="col-sm-8 p-0">
        <h5>{{ $item->name }}</h5>
        <p><b>{{$item->HomeopathProfile->designation}}</b></p>
      </div>
      <div class="col-sm-12">
        <p class="mt-3" style="color:#978f8f"><b>{{ $item->HomeopathProfile->location ?? '' }}</b></p>
      </div>
      <div class="v-box1 col-sm-12 p-0" style="height: 97px !important;">
        @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Badge")=='true')
        <div class="item">
          <img src="{{ asset(badge($item->badge)['path']) }}"  class="profile-bowl1 h-100 1"
          data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="{{ badge($item->badge)['title'] }}" style="border-radius: 0px;">
        </div>
        @endif

        @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Booking Milestone")=='true' && count(getHomeopathBookings($item->id)) >= 0)
        @php
          $modulas = 0;
          if((count(getHomeopathBookings($item->id)) % 5) == 0)
            $modulas = count(getHomeopathBookings($item->id));
          else
            $modulas = count(getHomeopathBookings($item->id)) - (count(getHomeopathBookings($item->id)) % 5);

        @endphp

        <div class="item2 ">
          <div class="text-center">
           <img src="{{ asset('uploads/badges/bookings_25.png') }}"class="profile-bowl" style="width:76px !important;height:45px" ><br/>
           <span style="font-size:8px;font-weight: 700;color: black;">
            {{$modulas}} BOOKINGS
          </span>
         </div>
        </div>
        @endif
        @if(homaopathBadgeStatus($item->HomeopathProfile->id,"Years")=='true')

         <div class="item3">
          <div>

            @if($item->HomeopathProfile->created_at->diffInMonths() >= 12)
            <img src="{{ asset('uploads/badges/year_1.png') }}"  class="profile-bowl"
            data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top" >
            @elseif($item->HomeopathProfile->created_at->diffInMonths() > 0)
            <span class="txt9" style="font-size:12px" >
              {{ $item->HomeopathProfile->created_at->diffForHumans() }} </span>
              @else
              <img src="{{ asset('uploads/badges/grand_opening.png') }}"  class="profile-bowl"
              data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
              @endif
            </div>

          </div>
        @endif
        
      </div>

      <div class="col-sm-6 p-0 text-center">
        <p style="font-size: large;color: #007bff;font-weight: 500;"><i class="fas fa-user-circle mr-1"></i>Enter Clinic</p>
      </div>
      <div class="col-sm-6 p-0 text-center">
        <p style="font-size: large;color: #007bff;font-weight: 500;"><i class="fas fa-calendar-check mr-1"></i>Book Now</p>
      </div>
        `;

    bindInfoWindow(marker, map, infoWindow, html_infowindow);
    markers.push(marker);
    @endforeach



    const markerCluster = new markerClusterer.MarkerClusterer({ mp, markers });
       markerCluster.addMarkers(markers, true); //if specify true it'll redraw the map



     }





     $(document).ready(function() {
       google.load("maps", "3.exp", {
         callback: initMaps,
         other_params: 'key=AIzaSyCVwpL3ta3ApX5weM8ETTHklnSG0WeC3b0&libraries=places,drawing'
       });
     })


     function bindInfoWindow(marker, map, infowindow, content)
     {
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(content);
        infowindow.open(map, marker);
      });
    }

    $(document).on('click', '.marker-pop', function(){
      window.location.href = ($(this).data('href'));
    })

  </script>

  <script>

    $(document).ready(function(){
      if(new URLSearchParams(window.location.search) == "")
      {

        @if(!Session::has('canvas__sidebar'))
        slideOut();
        @endif

      }

    });



    $(document).on('click', '.btn-connect', function(){

      $id = $(this).data('id');
      $self  = $(this);

      @if(!Auth::check())

      toastr.warning('Please login to connect with homeopath.');

      @else

      $.ajax({
        type: 'GET',
        url: '{{ route('social.connect.disconnect') }}?id='+$id,
        success: function (response) {
          toastr.success('You have '+response+' the connection.');
          response == 'followed' ? $self.text('Unfollow') : $self.text('Follow');
        }

      });

      @endif




    })
  </script>


  <script>





    function slideOut(){
     $( "#slide-out").toggle( "slide",{direction: "left"},700 );

     $( "#click-toggle-circle").hide( "slide", {direction: "right"},700 );
     $( "#click-toggle-arrow").hide( "slide", {direction: "right"},700 );
     $( "#slide-down-arrow").toggle( "slide", {direction: "right"},700);
          // $( "#slide-down-circle").toggle( "slide", {direction: "right"},700);
          return false;
        }



  //Slide out nav bar
  $("#slide-out").click(function()
  {
    $( "#slide-down").toggle( "slide", {direction: "up"},200);

    return false;
  });

     //Slide nav bar back in
     $("#slide-down-circle1").click(function()
     {
         //Hide button on click
          // $( "#slide-down-circle").toggle( "slide", {direction: "up"},200);
          // $( "#slide-down-arrow").toggle( "slide", {direction: "up"},200);
          //Slide nav menu back in
          $( "#slide-out").toggle( "slide", {direction: "left"});
          //Reveal nav button again
          // $( "#click-toggle-arrow").toggle( "slide", {direction: "up"},200);
          $( "#click-toggle-circle").toggle( "slide", {direction: "up"},200);
          return false;
        });

     function focusFunction(){
      var x = document.getElementById("focus");
      var welcome = document.getElementById("welcome");
      var name = document.getElementById("byname");
      if (x.style.display === "none") {
        x.style.display = "block";
        welcome.style.display = "none";
        name.style.display = "none";


      } else {
        x.style.display = "none";
        welcome.style.display = "block";
        name.style.display = "none";
      }
    }

    function nameFunction(){
      var x = document.getElementById("focus");
      var welcome = document.getElementById("welcome");
      var name = document.getElementById("byname");
      if (name.style.display === "none") {
        name.style.display = "block";
        welcome.style.display = "none";
        x.style.display = "none";

      } else {
        name.style.display = "none";
        welcome.style.display = "block";
        x.style.display = "none";
      }
    }

    function locationFunction()
    {

      var x = document.getElementById("location");
      var welcome = document.getElementById("welcome");
      var name = document.getElementById("location");
      if (x.style.display === "none") {
        x.style.display = "block";
        welcome.style.display = "none";
    // x.style.display = "none";

  }
  else
  {
    name.style.display = "none";
    welcome.style.display = "block";
    x.style.display = "none";
  }
}


function submitSearchForm($query)
{

  $form = $('#'+$query);


  if($form.find('input').val() == "")
  {
    toastr.warning('Fill the input field please');
    $form.find('input').focus();
    return false;
  }

  $form.submit();

}


function setFocusValue($value)
{
  $('#textSpecialization').val($value);
}


</script>
<script>



  $(document).on('change', '.radius', function() {


    if($('#latitude').val() == "")
    {
      $('#radius').addClass('d-none');
      toastr.warning('Please select your location area to choose radius');
      return false;
    }




    var map;

    $radius = $(this).val() * 1609.344;

            var latitude = parseFloat($('#latitude').val()); // YOUR LATITUDE VALUE
            var longitude = parseFloat($('#longitude').val()); // YOUR LONGITUDE VALUE



            var myLatLng = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('radius'), {
              center: myLatLng,
              zoom: 12
            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              radius: $radius,
              map: map,
              title: latitude + ', ' + longitude
            });


            var circle = new google.maps.Circle({
              center: myLatLng,
              map: map,
            radius: $radius,          // IN METERS.
            fillColor: '#1877F2',
            fillOpacity: 0.3,
            strokeColor: "#1877F2",
            strokeWeight: 2         // DON'T SHOW CIRCLE BORDER.
          });


            $('#radius').removeClass('d-none');


          })



  $(".btn-scroll").click(function() {
    $('html, body').animate({
      scrollTop: $("#go__down").offset().top
    }, 1000);
  });



  @php

  if(!Session::has('canvas__sidebar'))
  {
    Session::put('canvas__sidebar', true);
  }

  @endphp



  $(".canvas-nav-tabs a").click(function() {

    $type = '.canvas_'+$(this).data('type');


    $('.canvas-nav-tabs a').removeClass('bg-cyan');

    $('.canvas_content').addClass('d-none');
    $(this).addClass('bg-cyan');

    $($type).removeClass('d-none');

  })

  $('#welcome button').click(function(){
    $('#searchCanvasForm').submit();
  })



</script>





@endsection
