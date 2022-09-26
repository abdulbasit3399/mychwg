@extends('layouts.homeopath')
@section('title','Customer Management')
@section('heading','Customer Management')
@section('content')






    <div class="card mt-1">
        
        <h6 class="m-0"><span class="text-white bg-dark p-1">Customer Management</span></h6>
        <div class="card-content">
            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                
                                                <div class="card-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Phone #</th>
                                                                    <th>Patient Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> 
                                                                    @foreach($users as $item)

                                                                        <tr>
                                                                            <th>
                                                                                <h6>{{ $item->name ?? '' }}</h6>
                                                                                <p class="my-0 py-0">Country: {{ $item->country ?? 'N/A' }}</p>
                                                                                <p class="my-0 py-0">Zip/Postal Code: {{ $item->zip_code ?? 'N/A' }}</p>
                                                                            </th>
                                                                            <th>{{ $item->phone ?? 'N/A' }}</th>
                                                                            <td>
                                                                                <a href="mailto:{{ $item->email }}">
                                                                                    {{ $item->email }}
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
@endsection