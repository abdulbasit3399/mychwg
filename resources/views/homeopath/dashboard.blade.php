@extends('layouts.homeopath')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('css')
<style>
    .zoom-icon
    {
        background-color: #2174FF;
        color: #fff;
        padding: 16px;
        font-size: 30px;
        margin-right: 20px;
    }
    .btn-learn-more
    {
        background-color: #F6F7F9;
        border: 2px solid #D6D7DB;
        text-align: center;
        padding: 5px;
        font-weight: bold;
        color: #000;
    }
    .h5-heading
    {
        color: #B1B3B9;
        font-weight: bold;
    }

    .btn-attach,
    .btn-attach:hover
    {
        background-color: #4267B2;
        color: #fff;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 3px;
    }

    .bg-animated
    {
      background-color: #11639A;
      animation: changeBackgroundColor 3s infinite;
      color: #000 !important;
    }

    @keyframes changeBackgroundColor
    {
      0% {
        background-color: #1994e6;
      }
      25% {
        background-color: #1785cf;
      }
      50% {
        background-color: #1476b8;
      }

      75% {
        background-color: #1268a1;
      }

      100% {
        background-color: #11639A;
      }
    }


</style>
@endsection
@section('content')


<div class="col-xl-12 col-lg-12 bookings-section p-0">

<div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0  color-primary-dark-green">CAD {{ $income ?? 0 }}</h2>
                                        <p>Total Revenue</p>
                                    </div>
                                    <div class="avatar bg-tertiary-light-blue p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fas fa-dollar color-primary-dark-green font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-success">{{ count($active_appointments) }}</h2>
                                        <p>Active Appointments</p>
                                    </div>
                                    <div class="avatar bg-primary-light-gray p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-server text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-danger">{{ $total_appointments ?? 0 }}</h2>
                                        <p>Total Appointments</p>
                                    </div>
                                    <div class="avatar bg-primary-light-pink p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-list text-danger font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card bg-animated">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-white">{{ $today_appointments ?? 0 }}</h2>
                                        <p class="text-white font-weight-bold">Today Appointments</p>
                                    </div>
                                    <div class="avatar bg-rgba-dark p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="fa fa-list font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="col-lg-12 p-0">
        <div class="card">
            <div class="card-header d-flex align-items-start pb-0">

                    <h2 class="  mb-0 ">Latest appointments</h2>
                <div class="table-responsive">
                 <table class="table table-hover ">
                     <tr>
                         <th>Sr. </th>
                         <th width="15%">Apt. Date</th>
                         <th>Patient</th>
                         <th>Services</th>
                         <th>Status</th>
                         <th></th>
                         <th></th>
                         <th></th>
                     </tr>
                     @forelse($active_appointments as $item)
                         <tr>
                             <th>{{ $loop->iteration }}</th>
                             <th>
                                 <h4 class="text-secondary font-weight-bold m-0">{{ $item->date }}</h4>

                                 <h5 class="m-0">{{ getBookingTime($item->time_slot).' - '.getcompletedTime($item->time_slot)  }} </h5>
                             </th>
                             <th>
                                 {{ $item->user->name ?? '' }}
                                 @if($item->user)
                                     <a class="d-block text-primary" href="mailto:{{ $item->user->email }}">
                                         {{ $item->user->email }}
                                     </a>
                                 @endif
                             </th>
                             <td><h5 class="text-secondary m-0 p-0">{{ $item->HomeopathService->title ?? '' }}</h5></td>

                             <td>
                                 @if($item->status == 'active')
                                     <span class="badge badge-success">ACTIVE</span>
                                 @elseif($item->status == 'pending')
                                     <span class="badge badge-primary">PENDING</span>
                                 @elseif($item->status == 'completed')
                                     <span class="badge text-dark-gray">COMPLETED</span>
                                 @elseif($item->status == 'cancelled')
                                     <span class="badge badge-danger text-uppercase">{{ $item->status }}</span>
                                 @else
                                     <span class="badge badge-secondary text-uppercase">{{ $item->status }}</span>

                                 @endif
                             </td>
                         </tr>
                         @empty

                         <tr>
                             <th colspan="5" class="text-center">No any appointment found</th>
                         </tr>
                     @endforelse
                 </table>
                </div>


            </div>
        </div>
    </div>

                        <div class="col-lg-12 p-0">
                        <form method="post" action="{{ route('link.zoom') }}">
                            @csrf
                            <div class="card">

                                <div class="" style="position:absolute;right: 0;padding: 10px;">
                                    @if(Auth::user()->zoom_access_token == "")
                                        <h5 class="font-weight-bold text-danger">Inactive</h5>
                                    @else
                                        <h5 class="font-weight-bold text-success">Active</h5>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <div class="media">
                                        <i class="fas fa-video zoom-icon"></i>
                                      <div class="media-body">
                                        <h3 class="mt-0 font-weight-bold">Zoom</h3>
                                        <h5 ><span class="text-muted">By</span> <a href="https://zoom.us/" target="_blank">Zoom.us</a></h5>
                                        <a href="https://zoom.us/" target="_blank" class="btn-learn-more btn-block mt-1">Visit to learn more</a>
                                      </div>
                                    </div>
                                    <div class="email">
                                        <div class="form-group w-100">
                                            <label class="mb-1 mt-1">Connect Account</label>
                                            <input type="email" name="email" required="" autocomplete="off" class="form-control" value="{{Auth::user()->zoom_email ?? Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="permissions mt-2">
                                        <h5>By connecting your zoom account you can...</h5>
                                        <ul>
                                            <li>Set up virtual services</li>
                                            <li>Conduct virtual meet-ups</li>
                                        </ul>
                                    </div>

                                    @if(Auth::user()->zoom_access_token == "")

                                        {{-- <div class="jumbotron py-1 mb-1">
                                            <h5 class="h5-heading">Why zoom attachment is important?</h5>
                                            <p>Zoom attachement is mandatory in order to start meetings for events. if you will not attach your account. you will not be able to start your event session.</p>
                                            <h6 class="bg-rgba-info p-1 m-0"><span class="text-warning">NOTE: </span> There will be one time Zoom account integration and you dont need to attach again. Sincerely, if you will link it we will not ask it again.</h6>
                                            <h5>You can start generating virtual sessions with patients</h5>
                                        </div> --}}
                                        <h6 class="bg-rgba-info p-1 m-0" style="font-weight: 700;">NOTE: Only a one-time integration is required when connecting your Zoom account. Follow the steps in the confirmation email you receive from Zoom in order to verify the attachment.</h6>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h6 class="h5-heading">By clicking on the "Attach my account" button you agree to the <a target="_blank" href="https://explore.zoom.us/en/terms/">terms and conditions</a> of Zoom.us</h6>
                                        <hr class="mt-0">
                                        <button type="submit" class=" btn float-right btn-attach">Attach my account</button>
                                        <small class="text-center text-muted " style="padding-top: 5px;">Zoom will send confirmation email at your email address to verify your attachement.</small>

                                    @else
                                        <div class="jumbotron bg-rgba-warning text-center">
                                            {{--  <i class="far fa-smile text-success fa-5x"></i>  --}}
                                            <h2 class="text-success mt-1 font-weight-bold" style="color:#5BB46A">Your account is linked with Zoom</h2>
                                            @if($is_zoom_active == true)
                                                    <span><strong class="badge badge-success">Zoom account is activated <i class="fas fa-check"></i></strong></span><br>
                                                @else
                                                    <span><strong class="badge badge-danger">Zoom email not confirmed yet <i class="fas fa-times"></i></strong></span><br>
                                                @endif
                                            <small>For more info about linked accounts visit the <a href="">Zoom.us</a> now.</small>
                                            <hr>
                                            <h4>

                                                <span>Zoom email address: <strong class="text-success">{{ Auth::user()->zoom_email }}</strong></span><br>
                                                <span>Zoom ID: <strong class="badge badge-info">{{ Auth::user()->zoom_access_token }}</strong></span><br>


                                            </h4>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </form>
                     </div>
</div>



<div class="col-md-12 col-12 p-0 mb-5">
    @include('components.ads_banner')
</div>



        <!--=====================================================-->
                       <!-- order detail MODAL -->
        <!--=====================================================-->

            <div class="modal fade order_detail_modal pr-0" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header p-2">
                      <div class="modal-title">
                          <h5 class="m-0 p-0 font-weight-bold">Order Detail</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " id="order_detail_modal_body">
                    </div>
                  </div>
                </div>
              </div>

        <!--=====================================================-->
                       <!-- END order detail MODAL -->
        <!--=====================================================-->
@endsection

@section('js')

    <script type="">
        $(document).on('click','.detail_order_btn',function(e){
            e.preventDefault();
            var url=$(this).attr('href');

            $.ajax({
                method:'get',
                url:url,
                success:function(data)
                {
                    $('#order_detail_modal_body').html(data)
                    $('.order_detail_modal').modal('show');
                }
            })
        })
    </script>

@endsection
