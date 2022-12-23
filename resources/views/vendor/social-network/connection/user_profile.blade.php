@extends('layouts.social_network')

@section('title', $user->name)

@section('css')

@endsection

@section('content')











<div id="user-profile">

    <section id="profile-info">

        <div class="row pb-5 px-4">

    <div class="col-md-12 mx-auto">

                <a href="{{ route('social.index') }}">

                    <div class=" goto-back-section" >

                        Go to Newsfeed

                    </div>

                </a>

        <!-- Profile widget -->

        <div class="">

            <div class="px-4 pt-0 pb-4 cover-profile" style="background-image: url('{{ asset($user->userSocialProfile->cover ?? '') }}');">

                <div class="media align-items-end profile-head">

                    <div class="profile mr-3 mb-2"><img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" width="130" class="rounded mb-2 img-thumbnail">

                    </div>





                    <div class="media-body mb-5 text-white">

                        <h4 class="mt-0 mb-0"><span class="bg-dark px-1 text-white" style="opacity: 0.9;">{{ $user->name }}</span></h4>

                        <p class="small mb-4"> <i class="fas fa-info-circle mr-1"></i>{{ $user->userSocialProfile->caption ?? '' }}</p>

                    </div>

                </div>

            </div>



            <div class="">



                        <div class="row">







                            <div class="col-sm-9 mt-2">

                                @include('vendor.social-network.connection.user_profile_tabs')

                            </div>





                                <div class="col-sm-3 mt-2">

                                    <div class="card">



                                        <div class="card-body text-center">



                                        <div class="v-box1 text-center mb-2">



                                            <div class="item" style="background-color: #82f195;">

                                                <div>

                                                    <span class="txt20">{{ count($user->socialPosts) ?? 0 }}</span><br>

                                                    <span class="txt9">Posts</span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #6ecdf1;">

                                                <div>

                                                    <span class="txt20">{{ count($user->userFollowers) ?? 0 }}</span><br>

                                                    <span class="txt9">Members</span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #D4B89B;">

                                                <div>

                                                    <span class="txt20">{{badgesInformation($user->id)['articals']??0 }}</span><br>

                                                    <span class="txt9">Articles</span>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="v-box1 text-center">



                                            <div class="item" style="background-color: #ADBEEA;">

                                                <div>

                                                    <span class="txt20">{{badgesInformation($user->id)['events']??0  }}</span><br>

                                                    <span class="txt9">Events </span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #B1D09D;">

                                                <div>

                                                    <span class="txt20">{{ count($user->socialPosts) ?? 0 }}</span><br>

                                                    <span class="txt9">Attended Events </span>

                                                </div>

                                            </div>



                                            <div class="item" style="background-color: #F2F2F2;">

                                                <div>

                                                    <span class="txt20">{{ $user->created_at->diffForHumans() }}</span><br>

                                                    <span class="txt9"> </span>

                                                </div>

                                            </div>





                                        </div>




                                        @if(Auth::user()->id != $user->id)
                                            <hr>

                                            

                                            <div class="btn-group">





                                            <a class="btn btn-success text-white btn-connect text-capitalize font-weight-bold" data-id="{{ Crypt::encrypt($user->id) }}">

                                                @if(checkUserFollowing(Auth::id(), $user->id) > 0)

                                                    Unfollow

                                                @else

                                                    Follow

                                                @endif

                                            </a>



                                            <a data-toggle="modal" data-target="#exampleModal" href="javascript:void()" data-id="{{$user->id}}"  class="btn btn-dark">Message</a>



                                            </div>
                                            <hr>
                                            @endif





                                            

                                            <p>{{ $user->userSocialProfile->about ?? '' }}</p>





                                        </div>

                                    </div>



                                    <div class="card">

                                        <div class="card-body pt-1">

                                            <h6>Sponsored</h6>

                                            <div class="row">

                                                    @foreach(adsSponsorship() as $item)

                                                            <div class="col-md-12 pb-2">

                                                                <img src="{{ asset($item->image) }}" class="media-popup w-100"  data-src="{{ asset($item->image) }}">

                                                            </div>

                                                    @endforeach

                                            </div>

                                        </div>

                                    </div>



                                </div>







                        </div>





            </div>



        </div>

    </div>

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
                    <img class="mr-1" src="" id="author_image" style="width:41px;border-radius: 100px;height: 39px;">
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





















<!-- modal for first msg!-->

<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <form method="post" action="{{route('social.connection.send.message',$user->id)}}" id="first_msg_form">

            @csrf

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Send Message </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <input type="hidden" value="{{$user->id}}" name="receiver_id">

                    <input type="hidden" value="0" name="con_id">

                    <textarea name="message" rows="5" class="form-control border-0 border-white" placeholder="Write your message here... "></textarea>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Send Now</button>

                </div>

            </div>

        </form>

    </div>

</div>



@if(Auth::user()->role == 'advocate' || Auth::user()->role == 'homeopath')

<a data-toggle="modal" data-target="#modalReportUser" class="report-float" title="Report {{ $user->name ?? '' }}">

    <i class="far fa-flag"></i>

</a>

<div class="modal fade" id="modalReportUser" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header rounded-0" style="background:#546E7A;">

                <h5 class="modal-title text-white">Report {{ $user->name ?? '' }}</h5>

            </div>

            <form method="post" action="{{ route('social.report.user') }}">

                @csrf

                <input type="hidden" name="user_id" value="{{ Crypt::encrypt($user->id) }}">

                <div class="modal-body">

                    <textarea name="reason" placeholder="You are reporting! We want to here from you about report, but please don’t send irrelevent information. Right the report here." required=""></textarea>

                </div>

                <div class="py-1 px-1" style="background-color: #FAFAFA;">



                    <select class="form-control" required="" name="type">

                        <option value="Bad Content">Bad Content</option>

                        <option value="Hateful or abusive">Hateful or abusive</option>

                        <option value="Harassment or bullying">Harassment or bullying</option>

                        <option value="Harmful or dangerous acts">Harmful or dangerous acts</option>

                        <option value="Child abuse">Child abuse</option>

                        <option value="Promotes terrorism">Promotes terrorism</option>

                        <option value="Spam or misleading">Spam or misleading</option>

                        <option value="Infringes my rights">Infringes my rights</option>

                        <option value="Captions issue">Captions issue</option>

                        <option value="misleading">Misleading</option>

                    </select>

                    <small>Users are reviewed by CHWG staff 24 hours a day, 7 days a week to determine whether they violate Community Guidelines.

                    Accounts are penalized for Community Guidelines violations, and serious or repeated violations can lead to account termination.</small>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn font-weight-bold" data-dismiss="modal">CANCEL</button>

                    <button type="submit" class="btn text-primary font-weight-bold">REPORT</button>

                </div>

            </form>

        </div>

    </div>

</div>

@endif


@endsection

@section('custome_js')

<script type="text/javascript">
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
</script>


@endsection

