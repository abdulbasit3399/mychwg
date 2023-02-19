<div class="sidebar-profile-homeo">

    <img src="{{ asset($homeopath->HomeopathProfile->service_profile_img ?? 'uploads/users/default.png') }}" class="rect-profile-img" onerror="this.style.display=''">

    <h5 class="mt-3 font-weight-bold">{{ $homeopath->name??'' }}</h5>
    <small class="text-primary">{{ $homeopath->HomeopathProfile->designation??'' }}</small>

    <p class="mt-3 caption__homeo__short d-block">
        {{$homeopath->HomeopathProfile->caption}}
    </p>



    <div class="Badges-accolades mt-4">
        <h6 >Badges and accolades</h6>

            <div class="row" style="padding:0 11px;">
                <div class="col mb-5">
                  <div class=" " id="multiCollapseExample1">
                    <div class="v-box1 text-center mt-3 row" style="justify-content:start !important;">


                        @if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Badge")=='true')
                            <div class="main-accolade col-sm-4 mb-2 icon-border-radius">
                                <div>
                                    <img src="{{ asset(badge($homeopath->badge ?? '' )['path'] ?? '') }}" title="{{ badge($homeopath->badge??'')['title']??'' }}" class="" style="width:54px !important">
                                </div>
                                
                            </div>
                        @endif



                       @if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Booking Milestone")=='true' && count(getHomeopathBookings($homeopath->id)) >= 5)
                        @php
                          $modulas = 0;
                          if((count(getHomeopathBookings($homeopath->id)) % 5) == 0)
                            $modulas = count(getHomeopathBookings($homeopath->id));
                          else
                            $modulas = count(getHomeopathBookings($homeopath->id)) - (count(getHomeopathBookings($homeopath->id)) % 5);

                        @endphp
                            <div class="item2 ">
                                <div>
                                    <img src="{{ asset('uploads/badges/bookings_25.png') }}"class="profile-bowl " style="width:76px !important" ><br/>
                                    <span style="font-size:7px;font-weight: 700;color: black;">
                                    {{$modulas}} BOOKINGS
                                    </span>
                                </div>
                            </div>
                        @endif


                        @if(homaopathBadgeStatus($homeopath->HomeopathProfile->id,"Years")=='true')
                            <div class="col-sm-4 mb-2 icon-border-radius">
                                <div>
                                    @if($homeopath->HomeopathProfile->created_at->diffInMonths() >= 12)
                                    <img src="{{ asset('uploads/badges/year_1.png') }}"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:54px !important" data-toggle="popover" data-placement="top" >
                                    @elseif($homeopath->HomeopathProfile->created_at->diffInMonths() > 0)
                                    <span class="txt9" style="font-size:12px" >
                                        {{ $homeopath->HomeopathProfile->created_at->diffForHumans() }} </span>
                                    @else
                                    <img src="{{ asset('uploads/badges/grand_opening.png') }}"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:54px !important" data-toggle="popover" data-placement="top">
                                    @endif

                                </div>
                            </div>
                        @endif

                        @if(badgesInformation($homeopath->id)['posts'] >= 100)
                        <div class="main-accolade col-sm-4 icon-border-radius toggled-badge ">
                            <div>
                                <img src="{{ asset('uploads/badges/posts_100.png') }}"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                            </div>
                        </div>
                        @endif

                        @if(badgesInformation($homeopath->id)['resources'] >= 5)
                        <div class="main-accolade col-sm-4 icon-border-radius toggled-badge ">
                            <div>
                                <img src="{{ asset('uploads/badges/resources_5.png') }}"  class="profile-bowl"
                                    data-container="body" data-trigger="hover" style="width:76px !important" data-toggle="popover" data-placement="top">
                            </div>
                        </div>
                        @endif

                        {{-- <div class="col-lg-12 bg-white text-center" style="height:23px;">
                            <a class="btn-toggle-badges cursor-pointer" >
                                Show More <i class="fas fa-chevron-down" id="toggle-chevron-up-down"></i>
                            </a>
                        </div> --}}


                    </div>
                  </div>
                </div>
              </div>


    </div>



    <h6 class="mt-5 pt-5">Focus</h6>
    <p style="width: 270px;word-wrap: break-word;">

        @foreach(explodeString($homeopath->HomeopathProfile->specializations) as $focus)
            <span class="badge badge-secondary text-capitalize">{{ $focus }}</span>
        @endforeach


    </p>


    <h6 class="mt-5">Location</h6>
    <p>{{ $homeopath->HomeopathProfile->location }}</p>

    <h6 class="mt-5">Certifications</h6>
    <p>{{ $homeopath->HomeopathProfile->certifications_info }}</p>
    {{-- <a download="" href="{{ asset(json_decode($homeopath->HomeopathProfile->certifications)[0] ?? '') }}">My Ceritfications</a> --}}


    <h6 class="mt-5">Affiliations</h6>
    <p>{{ $homeopath->HomeopathProfile->affiliations }}</p>


    <h6 class="mt-5">Contact</h6>
    <p class="font-weight-bold">Tel: <a class="text-dark font-weight-normal" href="tel:{{ $homeopath->phone ?? 'N/A' }}">{{ $homeopath->phone ?? 'N/A' }}</a></p>
    <p class="font-weight-bold">Email: <a class="text-dark font-weight-normal" href="mailto:{{ $homeopath->email }}">{{ $homeopath->email }}</a></p>

</div>
