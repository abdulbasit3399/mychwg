@extends('layouts.admin')
@section('title','Revenue Report')
@section('heading','Revenue Report')


@section('content')

{{--  <h3 class="text-center text-muted">Minimum transfer of payout amount must be greater than <span class="text-danger"> CAD 99 and account (Stripe/Paypal)</span> of homeopath must connected.</h3>  --}}

<section>
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table datatable p-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th>Homeopath</th>
                                        <th>Account Attached</th>
                                        <th>Total Revenue (Balance)</th>
                                        <th class="text-right">----------</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                        <tr class="tr">

                                            <td class="font-weight-bold">
                                                {{$item->name ?? ''}}<br>
                                                <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                            </td>
                                            <td>
                                                @if($item->connect_type != "")
                                                <span class="badge badge-success text-uppercase font-weight-bold">{{ $item->connect_type }}</span>
                                                @else
                                                    <span class="badge badge-danger text-uppercase font-weight-bold">Not connected yet</span>
                                                @endif

                                            </td>
                                            <td><h2 class=" text-success"><em style="font-size: 14px">CAD</em> <strong>{{number_format($item->balance, 2)}}</strong></h2></td>
                                            <td class="text-right">
                                                @if($item->balance > 99 && $item->connect_type != "")
                                                    <a href="{{ route('admin.transfer.amount', $item->id) }}" class="font-weight-bold btn btn-primary alert-confirm">Transfer amount</a>
                                                @else
                                                    <small class="text-danger">Not eligible yet to transfer</small>
                                                @endif
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
</section>








@endsection

@section('js')

@endsection
