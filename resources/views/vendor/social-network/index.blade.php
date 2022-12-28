@extends('layouts.social_network')

@section('title','Materia Faction')

@section('css')

<style>

  .item img {

/*    max-width: 87%;*/

    height: auto;

  }



</style>

@endsection



@section('content')



<div id="user-profile">



  <section id="profile-info">



    <div class="row">

      <div class="col-lg-3 col-12 pt-lg-1-1 side_div" id="left">

        <div class="row">

          <div class="col-lg-12 col-12">

            <div class="card mt-lg-0"  >

              <div class="card-body ">

                <a href="#" onclick="goBack()" class="social_back_btn">

                  <i class="fas fa-arrow-left"></i>

                </a>

                <div class="text-center">

                  <img class="profile-avatar mb-1" src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">

                  <h6 class="m-0">{{ Auth::user()->name }}</h6>

                  <small class="location">{{ Auth::user()->userSocialProfile->location ?? 'N/A' }}</small>



                  <div class="row mt-2 account-counter" style="justify-content:center;">



                    <div class="vendors-list-profile-details pt-1 m-auto1">



                      <div class="v-box1-1 social-badges row" style="margin:0 auto;width: 80%;">
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey">
                            <img src="{{ asset(badge(Auth::user()->badge)['path']) }}" title="{{ badge(Auth::user()->badge)['title'] }}" style="border-radius:8px">
                          </div>
                        </div>

                        @if(badgesInformation(Auth::id())['posts'] >= 100)
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey">

                            <div>
                              <img src="{{ asset('uploads/badges/posts_100.png') }}"  class="profile-bowl"
                              data-container="body" data-trigger="hover" style="height: 49px;" data-toggle="popover" data-placement="top">
                            </div>
                          </div>
                        </div>
                        @endif



                        @if(badgesInformation(Auth::id())['resources'] >= 5)
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item1">

                            <div>
                              <img src="{{ asset('uploads/badges/resources_5.png') }}"  class="profile-bowl"
                              data-container="body" data-trigger="hover" style="border-radius: 6px;" data-toggle="popover" data-placement="top">
                            </div>
                          </div>
                        </div>
                        @endif


                        @if(Auth::user()->HomeopathProfile)
                        @if(homaopathBadgeStatus(Auth::user()->HomeopathProfile->id,"Booking Milestone")=='true' && count(getHomeopathBookings(Auth::user()->id)) >= 5)
                        @php
                        $modulas = 0;
                        if((count(getHomeopathBookings(Auth::user()->id)) % 5) == 0)
                          $modulas = count(getHomeopathBookings(Auth::user()->id));
                        else
                          $modulas = count(getHomeopathBookings(Auth::user()->id)) - (count(getHomeopathBookings(Auth::user()->id)) % 5);

                        @endphp
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey">

                            <div>
                              <img src="{{ asset('uploads/badges/bookings_25.png') }}"class="profile-bowl "   ><br/>
                              <span style="font-size:8px;font-weight: 800;color: black;">
                                {{$modulas}} BOOKINGS
                              </span>
                            </div>

                          </div>
                        </div>
                        @endif
                        @endif


                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey" style="">

                            <div>

                              @if(Auth::user()->created_at->diffInMonths() >= 12)
                              <img src="{{ asset('uploads/badges/year_1.png') }}"  class="profile-bowl"
                              data-container="body" data-trigger="hover"   data-toggle="popover" data-placement="top" >
                              @elseif(Auth::user()->created_at->diffInMonths() > 0)
                              <span class="txt9" style="font-size:12px" >
                                {{ Auth::user()->created_at->diffForHumans() }}
                              </span>
                              @else
                              <img src="{{ asset('uploads/badges/grand_opening.png') }}"  class="profile-bowl"
                              data-container="body" data-trigger="hover" style="width:54px !important" data-toggle="popover" data-placement="top">
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey">

                            <div>

                              <strong class="connections-count">{{ count(Auth::user()->userFollowers) }}</strong>

                              <small>CONNECTIONS</small>

                            </div>

                          </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                          <div class="item bg-grey" >

                            <div>

                              <strong class="group-count">{{ count(Auth::user()->userSocialGroups) }}</strong>

                              <small>GROUPS</small>

                            </div>

                          </div>
                        </div>

                      </div>

                    </div>



                    {{-- <div class="vendors-list-profile-details pt-1 m-auto1">



                      <div class="v-box1 social-badges">










                      </div>

                    </div> --}}







                  </div>

                </div>



                <hr class="mt-0">

                <div class="account-sidebar-links ml-1 main-clickable-links">

                  <a data-page="news_feed" class="news_feed"><i class="fas fa-home"></i> Home</a>

                  <a data-page="messages" class="messages"><i class="fas fa-inbox" style="padding-right:34px !important;"></i>Messages</a>

                  <a data-page="about" class="about"><i class="fas fa-info-circle"></i> About</a>

                  <a data-page="events" class="events"><i class="fas fa-comment-alt pr-1"></i> Events</a>

                  <a data-page="connections" class="connections"><i class="fas fa-user-alt"></i> Connections</a>

                  <a data-page="groups" class="groups"><i class="fas fa-users"></i> Groups</a>

                  <a data-page="media" class="media"><i class="fas fa-camera"></i> Media</a>



                </div>



              </div>

            </div>



            <div class="groups-connection-card">

              <div class="card">

                <div class="card-body">

                  <div class="row">

                    <div class="col-sm-12 text-left mb-2">

                      <strong>Connections</strong>

                    </div>



                    @foreach(Auth::user()->userFollowers->sortByDesc('id') as $follower)

                    @if($follower->id!=Auth::user()->id)



                    <div class="col-4 col-sm-4 pb-1 px-0 {{ $follower->user_name }}">

                      <a href="{{ route('social.connection.profile', [$follower->user_name ?? '',$follower->slug??'']) }}" class="text-dark" target="_blank">

                        <img class="profile-avatar-small" src="{{ asset($follower->avatar) }}" alt="">

                        <small>{{ $follower->name }}</small>

                      </a>

                    </div>



                    @if($loop->iteration == 9)

                    <div class="col-md-12 text-right main-clickable-links">

                      <a data-page="connections" class="btn-social-dark">View more connections</a>

                    </div>

                    @break

                    @endif



                    @endif



                    @endforeach





                  </div>



                </div>

              </div>



              <div class="card">

                <div class="card-body">

                  <div class="row text-left">

                    <div class="col-sm-12 mb-2">

                      <strong>Groups</strong>

                    </div>



                    @foreach(Auth::user()->userSocialGroups->sortByDesc('id') as $group)

                    <div class="col-sm-12 mb-2 group-{{ $group->id }}">

                      <a href="{{ route('social.group.detail', Crypt::encrypt($group->id)) }}" target="_blank" class="text-dark">

                        <img class="profile-avatar-small" src="{{ asset($group->avatar) }}" alt="">

                        <strong class="pl-1">{{ $group->title }}</strong>

                      </a>

                    </div>



                    @if($loop->iteration == 9)

                    <div class="col-md-12 text-right main-clickable-links">

                      <a data-page="groups" class="btn-social-dark">View more connections</a>

                    </div>

                    @break

                    @endif



                    @endforeach



                  </div>



                </div>

              </div>



              <div class="card">

                <div class="card-body">

                  <div class="row">

                    <div class="col-sm-12 text-left mb-2">

                      <strong title="Members that are following you">Followers</strong>

                    </div>



                    @foreach(Auth::user()->userFollowings->sortByDesc('id')->take(9) as $follower)

                    <div class="col-4 col-sm-4 pb-1 px-0 {{ $follower->user_name }}">

                      <a href="{{ route('social.connection.profile', $follower->user_name ?? '') }}" class="text-dark" target="_blank">

                        <img class="profile-avatar-small" src="{{ asset($follower->avatar) }}"  alt="">

                        <small>{{ $follower->name }}</small>

                      </a>


                    </div>





                    @endforeach





                  </div>



                </div>

              </div>





            </div>

          </div>

        </div>

      </div>



      <!--=============================================-->

      <!--======RENDER PAGES======-->

      <!--=============================================-->





      <div class="col-lg-9 render-page" id="center">



        <!-- {{-- @include('vendor.social-network.pages.news_feed') --}} -->

      </div>



      <!--=============================================-->

      <!--======END RENDER PAGES======-->

      <!--=============================================-->







    </div>

  </section>

</div>

<div class="modal fade bg-dark1" id="viewsingleResource" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-zoom" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-body p-0" style="overflow: auto;overflow-x: hidden;background-color: #F6F6F6;">
            <div class="row p-1" style="background-color: #254A51;color: #fff;">
              <div class="col-sm-9">
                  <div class="media">
                    <img class="mr-1" src="" id="author_image" style="width:40px;border-radius: 100px;">
                    <div class="media-body p-0">
                      <h5 class="my-0 resource-author text-white"></h5>
                      <small>Practitioner</small>
                    </div>
                  </div>
              </div>
              <div class="col-sm-3 text-right m-auto">
                <a data-dismiss="modal" aria-label="Close" style="color:#fff;opacity: 0.7;font-weight: bold;cursor: pointer;">Go Back</a>
              </div>
            </div>

            <div class="row p-3" style="height:420px">
              <div class="col-sm-9">
                    <div style="font-weight: 900;font-size: 2.6vw;">"<span id="resource-title"></span>"</div>
                    <div style="opacity: 0.7;font-weight: bold;font-size: 16px;">By <span class="resource-author"></span></div>
                      <div class="mt-3" id="resource-description"></div>
                      <a href="" id="pdf1" target="_blank" class="btn rounded-0 px-3 py-2" style="position:absolute;bottom: 0;background-color: #E5BCB3;color: #fff;">Read Now</a>
              </div>

              <div class="col-sm-3 px-0 m-auto">
                  <img id="resource_image" src="" style="width:100%;box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);
-webkit-box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);
-moz-box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);">
              </div>

            </div>

        </div>
      </div>
    </div>
  </div>






@endsection

@section('custome_js')


<script>
  function copyToClipboard(element) {
    var link = element.attributes.href.value;
    navigator.clipboard.writeText(link);
    toastr.success("Copied to clipboard.");
  }


  $(document).on('click','.btn-read', function(){
    $('#viewAllResources').modal('hide');

    $('#resource_image').attr('src', $(this).data('src'));
    $('#resource-title').text($(this).data('title'));
    $('.resource-author').text($(this).data('author'));
    $('#resource-description').html($(this).data('description'));
    $('#author_image').attr('src', $(this).data('author_image'));

    if($(this).data('pdf').length == 0)
    {
      $('#pdf1').addClass('d-none');
    }
    else
    {
      $('#pdf1').removeClass('d-none');
      $('#pdf1').attr('href',$(this).data('pdf'));
    }

    $('#viewsingleResource').modal('show');
  })


        // to do:please check it for other scenarios

        $('.custom-toast').addClass('d-none')

        $(document).ready(function() {

          setTimeout(function() {$('.custom-toast').removeClass('d-none')}, 1000);

        });





        $('.multiple-items').slick({

          infinite: false,

          slidesToShow: 3,

          slidesToScroll: 3

        });



        var page = 1; //track user scroll as page number, right now page number is 1

        // load_more(page); //initial content load

        $(window).scroll(function() { //detect page scroll

            if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page

                page++; //page number increment

                load_more(page); //load content

              }

            });







        function load_more(page){

         var sPageURL = window.location.search.substring(1),

         sURLVariables = sPageURL.split('&'),

         sParameterName,

         i;



         $.ajax({

          url: '{{ route('social.render.page') }}?'+sURLVariables+'&page=' + page,

          type: "get",

          datatype: "html",

          beforeSend: function()

          {

            $('.auto-load').show();

          },



        })

         .done(function(data)

         {

          if(data.length == 0){

            console.log(data.length);

                        //notify user if nothing to load

                        $('.auto-load').html("No more records!");

                        return;

                      }

                      $('.auto-load').hide();





                      $("#results").append(data);

                      convertInTags();

                    })

       }



     </script>



     @endsection



