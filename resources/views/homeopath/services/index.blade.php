@extends('layouts.homeopath')

@section('title','Services')

@section('heading','Services')





@section('content')



<div class="card">

    <div class="card-header pb-1">

        <h3>My Service(s)</h3>

        <div class="btn-group">



            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#serviceIntervalSetModal">

              Set Time Interval

            </button> --}}

            <button class="btn btn-primary btn-add-service float-right" data-action="{{ route('homeopath.services.create') }}">+  create my new service</button>

        </div>

    </div>

</div>



<div class="row">

    @foreach(Auth::User()->HomeopathServices as $item)

        <div class="col-xl-4 col-md-4 col-sm-12 mb-4">

            <div class="card">

                <div class="card-content">

                    <div class="card-body">

                        @if($item->thumbnail)

                            <img class="card-img service-thumbnail mb-1" src="{{ asset($item->thumbnail??'uploads/img/resource.PNG') }}">

                        @else

                            <img class="card-img service-thumbnail mb-1" src="{{ asset('uploads/img/service.PNG') }}">

                        @endif



                        <h5 class="mt-1">{{ $item->title }}</h5>

                        <hr class="my-1">

                        <div class="d-flex justify-content-between mt-2">

                            <div class="float-left">

                                <p class="font-weight-bold mb-0">Duration</p>

                                <span class="badge badge-dark">{{ $item->duration }} Minutes</span>

                            </div>

                            <div class="float-right">

                                <p class="font-weight-bold mb-0">Status</p>

                                <span class="badge badge-primary">{{ $item->status }}</span>

                            </div>

                        </div>

                        <hr class="my-1">

                        <a href="{{ route('homeopath.services.detail', Crypt::encrypt($item->id)) }}" class="btn btn-block btn-dark">View Service</a>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>



<!-- Button trigger modal -->





<!-- interval setup Modal -->

<div class="modal fade" id="serviceIntervalSetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

            <form action="{{route('homeopath.settings.service.time')}}" method="post">



                <div class="modal-content">

                  <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Select Time</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>

                  </div>

                  <div class="modal-body">



                            @csrf

                             <input type="hidden" name="id" value="{{Auth::user()->id}}">



                            <div class="form-group">

                                <select class="select2 form-control" name="set_time">

                                    <option value="">Select One</option>



                                    @for($i=5; $i<=120 ; $i+=5)

                                    <option @if(Auth::user()->HomeopathProfile->service_time_interval==$i) selected @endif value="{{$i}}">{{$i}}</option>

                                    @endfor



                                </select>

                            </div>



                  </div>

                  <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Save</button>

                  </div>

                </div>

            </form>



  </div>

</div>















<!-- Modal for ADD/UPDATE color -->

<div class="modal fade" id="modalAddService" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">My Service</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body" style="max-height: 500px; overflow: auto;">

                <form method="post" action="" enctype="multipart/form-data"id="new_homeopath_service_form">

                    @csrf

                    <label>Service Title</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="e.g. Initial Consultation" required="">

                    </div>

                    <label>Service Duration</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="duration">

                            @for($i=30; $i< 181; $i+=30)

                                <option value="{{ $i }}">{{ $i }} Minutes</option>

                            @endfor

                        </select>

                    </div>



                    <label>Price Rate (CAD)</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="price">

                            @for($i=5; $i< 500; $i+=5)

                                <option value="{{ $i }}">{{ $i }}</option>

                            @endfor

                        </select>

                    </div>



                    <label>Service Thumbnail</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="file" class="dropify" id="thumbnail" name="thumbnail" required="">

                    </div>



                    <label>Service Type</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="type">

                            <option value="featured">Featured</option>

                            <option value="popular">Popular</option>

                            <option value="new">New</option>

                            <option value="old">Old</option>

                            <option value="other">Other</option>

                        </select>

                    </div>





                    <label>Service Handled via</label>

                    <div class="input-group mb-2 mr-sm-2 mt-2 pr-3">



                        <input type="checkbox" name="meeting_handled_via[]" value="Offline" class="meeting_handled_via_offline">

                        <label>Offline</label>



                    </div>

                    <div class="input-group mb-2 mr-sm-2">



                        <input type="checkbox" name="meeting_handled_via[]" value="Online" class="meeting_handled_via_online">

                        <label>Online</label>



                    </div>





                    <label>Service Theme <small>(Select desired theme for booking)</small></label>

                    <div class="input-group mb-2 mr-sm-2">

                        @foreach(serviceThemes() as $item)

                           <label class="selectTheme" for="option-{{ $loop->iteration }}" style="background-image:url('{{ asset($item->cover) }}')">

                               <input type="radio" name="service_theme_id" value="{{ $item->id }}" id="option-{{ $loop->iteration }}" required="">

                           </label>

                        @endforeach

                    </div>





                    <label>Want to Display Additional Service Appointment Documents?</label>

                    <div class="input-group mb-2 mr-sm-2">

                        <select class="form-control" name="is_show_additional_doc">

                            <option value="Yes" selected>Yes</option>

                            <option value="No">No</option>
                        </select>

                    </div>



                    <div class="text-right">

                        <button class="btn btn-dark" type="button" id="new_homeopath_service_save_btn">Save</button>

                    </div>



                </form>

            </div>

        </div>

    </div>

</div>



@endsection







@section('js')

<script>

        $(document).on('click', '.btn-add-service', function(){

            var modal = $('#modalAddService');

            modal.find('form').attr('action', $(this).data('action'));

            $('#title').val('');



            $('#modalAddService').modal('show');

        })



        $('#new_homeopath_service_save_btn').on('click',function(){

            if ($('.meeting_handled_via_online').is(':checked') || $('.meeting_handled_via_offline').is(':checked'))

             {

                $('#new_homeopath_service_form').submit();

             }else{

                toastr.success('Please select Your service is online or offline');

             }

        })







</script>

@endsection

