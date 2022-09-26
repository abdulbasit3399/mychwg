@extends('layouts.homeopath')
@section('title','Financial Statement')
@section('heading','Financial Statement')
@section('content')






    <div class="card mt-1">
        
        <h6 class="m-0"><span class="text-white bg-dark p-1">Financial Statement</span></h6>
        <div class="card-content">
            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                
                                                <div class="card-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Service</th>
                                                                    <th>Patient</th>
                                                                    <th>Booking Date</th>
                                                                    <th width="12%">Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Payment Method</th>
                                                                    <th>Transaction ID</tcancelledh>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse(Auth::user()->HomeopathServices as $service)
                                                                    
                                                                    @foreach($service->ServiceBookings->sortByDesc("id") as $item)
                                                                        @if($item->status != 'cancelled')
                                                                        <tr>
                                                                            <th>{{ $service->title }}</th>
                                                                        <td>
                                                                        <strong class="d-block">{{ $item->user->name }}</strong>
                                                                        <a href="mailto:{{ $item->user->email }}">
                                                                                    {{ $item->user->email }}
                                                                                </a> 
                                                                        </td>
                                                                        <td>{{ $item->created_at->format('d F Y') }}</td>
                                                                        <td class="text-danger font-weight-bold"><em><u>CAD ${{ number_format($item->price, 2) }}</u></em></td>
                                                                        <td><span class="badge badge-warning text-uppercase">{{ $item->status }}</span></td>
                                                                        <th class="text-uppercase text-center">
                                                                            {{ $item->payment_method }}
                                                                            
                                                                            @if($item->payment_method == 'pay-later')
                                                                                <span class="badge badge-success d-block"><strong>Via: </strong> {{ $item->later_pay_method ?? 'N/A' }}</span>
                                                                            @endif

                                                                        </th>
                                                                        <th><span class="badge badge-dark">{{ $item->transaction_id }}</span></th>
                                                                        </tr>
                                                                        @endif
                                                                    @endforeach

                                                                    
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">
                                                                                <h5 class="alert alert-warning">No appontment(s) were found right now</h5>
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse
                                                                    

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
@endsection