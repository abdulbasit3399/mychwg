@extends('layouts.admin')

@section('title','Subscriptions')

@section('heading','Subscriptions')

@section('css')



@endsection

@section('content')



    <div class="row">



        <div class="col-sm-12">

            <div class="card">

                <div class="card">

                    <div class="card-content">

                        <div class="card-body pb-0">

                            <table class="table p-0">

                                <thead>

                                <tr>

                                    <th>Name</th>

                                    <th>Subscribers</th>

                                    <th>Revenue</th>

                                </tr>

                                </thead>

                                <tbody>

                                    @foreach($group as $key => $item)

                                        <tr>

                                            <td class="text-capitalize">
                                                @if(env('HOMEOPATH_YEARLY_PLAN_SQUARE') == $item->plan_id)
                                                    HOMEOPATH YEARLY PLAN
                                                @elseif(env('HOMEOPATH_MONTHLY_PLAN_SQUARE') == $item->plan_id)
                                                    HOMEOPATH MONTHLY PLAN
                                                @elseif(env('ADVOCATE_YEARLY_PLAN_SQUARE') == $item->plan_id)
                                                    ADVOCATE YEARLY PLAN
                                                @elseif(env('ADVOCATE_MONTHLY_PLAN_SQUARE') == $item->plan_id)
                                                    ADVOCATE MONTHLY PLAN
                                                @endif
                                                </td>

                                            <td>{{ $item->total }}</td>

                                            <td>${{$item->total_rev}} CAD</td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="col-sm-12">

            <div class="card">

                <div class="card">



                    <div class="card-content">

                        <div class="card-body card-dashboard">

                            <h3>Transaction History</h3>

                            <div class="table-responsive">



                                <table class="table datatable p-0 table-hover-animation">

                                    <thead>

                                    <tr>

                                        <th>Name & ID</th>

                                        <th>Subscription</th>

                                        <th>Transaction Amt</th>

                                        <th>Date</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                        @foreach($payments as $item)

                                            <tr>

                                                <th>{{ $item->user ? $item->user->name : '' }} (CHWGRN{{ $item->user ? $item->user->id : ''}})</th>

                                                <td>
                                                @if(env('HOMEOPATH_YEARLY_PLAN_SQUARE') == $item->plan_id)
                                                    HOMEOPATH YEARLY PLAN
                                                @elseif(env('HOMEOPATH_MONTHLY_PLAN_SQUARE') == $item->plan_id)
                                                    HOMEOPATH MONTHLY PLAN
                                                @elseif(env('ADVOCATE_YEARLY_PLAN_SQUARE') == $item->plan_id)
                                                    ADVOCATE YEARLY PLAN
                                                @elseif(env('ADVOCATE_MONTHLY_PLAN_SQUARE') == $item->plan_id)
                                                    ADVOCATE MONTHLY PLAN
                                                @endif
                                                </td>

                                                <td>${{ $item->payment}} CAD</td>

                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>

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

@endsection

@section('js')



@endsection

