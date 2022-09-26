@extends('layouts.admin')
@section('title','News Letter Email')
@section('heading','News Letter Email')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <form method="post" action="{{route('newsletter.email.send')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 form-group">
                            <label>Send Newsletter</label>
                            <input type="file" name="mail_file" class="form-control" accept=".doc,.docx,.pdf,image/*">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary">Send to all</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($data as $item)

                                    <tr>
                                        <td>{{$item->email??''}}</td>
                                        
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
