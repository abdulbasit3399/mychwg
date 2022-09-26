@extends('layouts.homeopath')

@section('title','Appointment Management')

@section('heading','Appointment Management')

@section('content')



    <div class="card mt-1">

        <div class="card-content">

            <div class="card-body">

                    <div class="">

                        <a href="" class="text-primary">Appointments</a>

                    </div>



                <form method="GET" action="" class="mb-2">

                        <div class="row">

                            <div class="col-sm-2">

                                <small>Booking Created From</small>

                                <input type="text" class="form-control datepicker" name="from" readonly="" value="{{ $req->from ?? '' }}">

                            </div>

                            <div class="col-sm-2">

                                <small>Booking Created To</small>

                                <input type="text" name="to" class="form-control datepicker" readonly="" value="{{ $req->to ?? '' }}">

                            </div>

                            <div class="col-sm-3">

                                <small>Service</small>

                                <select class="form-control text-capitalize" name="service">

                                    <option value="">--------------</option>

                                    @foreach(Auth::user()->HomeopathServices as $service)

                                        <option value="{{ base64_encode($service->id) }}"

                                            @if(isset($req->service)) @if($req->service == base64_encode($service->id)) selected="" @endif @endif>

                                            {{ $service->title }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-sm-3">

                                <small>Patient</small>

                                <select class="form-control text-capitalize" name="patient">

                                    <option value="">--------------</option>



                                    @foreach($users as $user)

                                            <option value="{{ base64_encode($user->id) }}"

                                                @if(isset($req->patient)) @if($req->patient == base64_encode($user->id)) selected="" @endif @endif>

                                                {{ $user->name }}

                                            </option>

                                    @endforeach



                                </select>

                            </div>



                            <div class="col-sm-2">

                                <small style="visibility:hidden;">-</small>

                                <button class="btn btn-primary btn-block"><i class="feather icon-filter"></i> Filter</button>

                            </div>



                        </div>

                    </form>



                    <hr class="mb-0">



                                    <div class="row">

                                        <div class="col-12">

                                            <div class="card">



                                                <div class="card-content">

                                                    <div class="table-responsive w-100">

                                                        <table class="table table-hover datatable">

                                                            <thead>

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

                                                            </thead>

                                                            <tbody>

                                                                @foreach($bookings as $item)

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



                                                                            <td>



                        @if($item->status == 'completed' || $item->status == 'closed' || $item->status == 'cancelled')

                                                                                @if($item->status == 'completed')



                                                                                <a href="{{ route('prescription', $item->uuid) }}" target="_blank" class="btn btn-primary btn-sm">View Prescription</a>

                                                                                @endif

                                                                                @else

                                                                                   <form action="{{route('homeopath.bookings.update.status')}}" id="appointment_status_change_form" method="get">

                                                                                    <input type="hidden" name="status" id="hidden_appointment_status" value="">

                                                                                    <input type="hidden" name="id" id="hidden_appointment_id" value="">

                                                                                    <input type="hidden" name="note" id="hidden_appointment_note" value="">



                                                                                     <select class="w-100 py-0 booking_status_change" data-href="#">

                                                                                        <option value="">Choose status:</option>

                                                                                        <option value="{{Crypt::encrypt($item->id)}}" data-status="{{base64_encode('closed')}}" >Closed</option>

                                                                                        <option value="{{Crypt::encrypt($item->id)}}" data-status="{{base64_encode('cancelled')}}">Cancelled</option>



                                                                                    </select>



                                                                                   </form>

                                                                                @endif







                                                                            </td>



                                                                            <td>

                    @if($item->status == 'completed' || $item->status == 'closed' || $item->status == 'cancelled')

                                                                                ------------------

                                                                                @else

                                                                                <button class="btn btn-sm btn-dark btn-block btn-complete" data-id="{{ Crypt::encrypt($item->id) }}">Mark Complete</button>



                                                                                 <form action="{{route('service.zoom.meeting')}}" method="post">

                                                                                    @csrf

                                                                                    <input type="hidden" name="service_id" value="{{$item->homeopath_service_id}}">

                                                                                    <input type="hidden" name="slot" value="{{ getBookingTime($item->time_slot)  }}">

                                                                                    <input type="hidden" name="user_id" value="{{$item->user->id}}">

                                                                                    <button class="btn btn-sm  btn-block btn-success mt-1" type="submit">Start Meeting</button>





                                                                                </form>





                                                                                @endif

                                                                            </td>







                                                                            <td class="text-right">



                                                                                <a href="#"

                                                                                        class="btn-update-apt"

                                                                                        data-="{{ Crypt::encrypt($item->id) }}"

                                                                                        data-apt="{{ $item->date }}, {{ getBookingTime($item->time_slot) }}"

                                                                                        data-illness="{{ $item->illness ?? 'N/A' }}"

                                                                                        data-allergies="{{ $item->allergies ?? 'N/A' }}"

                                                                                        data-concern="{{ $item->concern ?? 'N/A' }}"

                                                                                        data-status="{{ $item->status }}"

                                                                                        >

                                                                                            <i class="fas fa-eye fa-2x text-secondary"></i>

                                                                                    </a>





                                                                            </td>

                                                                        </tr>

                                                                @endforeach

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

            </div>

        </div>

    </div>









<!--==================================================================-->

                        <!--MODAL SECTIONS-->

<!--==================================================================-->

<!-- Button trigger modal -->



<!-- Modal for ADD  -->

<div class="modal fade" id="modalUpdateApt">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Appointment Information</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <h4>

                    <strong class="text-warning">Appointment Date/Time: </strong>

                    <span id="apt"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Illness: </strong>

                    <span id="illness"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Allergies: </strong>

                    <span id="allergies"></span>

                </h4>

                <h4>

                    <strong class="text-warning">Health Concern: </strong>

                    <span id="concern"></span>

                </h4>



                <h4 class="mt-5">

                    <strong class="text-warning">Appointment Status: <em class="text-success text-uppercase" id="status"></em></strong>

                </h4>





            </div>

        </div>

    </div>

</div>





<!-- modal for note to cancel -->







<!-- Modal -->

<div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Provide the reason for cancellation</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <textarea class="form-control" rows="3" id="note_textarea" placeholder="Write note..."></textarea>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary submit_note_btn" data-dismiss="modal">Skip</button>

        <button type="button" class="btn btn-primary submit_note_btn" id="submit_note_btn">Submit</button>

      </div>

    </div>

  </div>

</div>





@endsection



@section('js')

<script>



    $(document).on('click', '.btn-update-apt', function(){

        $modal = $('#modalUpdateApt');



        $('#apt').text($(this).data('apt'));

        $('#illness').text($(this).data('illness'));

        $('#allergies').text($(this).data('allergies'));

        $('#concern').text($(this).data('concern'));

        $('#status').text($(this).data('status'));





        $modal.modal('show');

    })









</script>

<script>

    $(document).on('click', '.btn-complete', function() {

        $('#booking_id').val($(this).data('id'));

        $('#markBookingComplete').modal('show');

    })

</script>

@endsection

