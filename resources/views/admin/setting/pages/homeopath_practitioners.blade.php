@extends('layouts.admin')
@section('title','Setting')
@section('heading','Homeopath Practitioners')


@section('content')

<section>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Homeopath Practitioners</h4>
                                <a class="font-weight-bold" href="{{ route('admin.setting.index') }}">(Back to Control panel)</a>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$setting['pracitioners_title'] ?? ''}}" name="pracitioners_title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Heading</label>
                                            <input type="text" value="{{$setting['pracitioners_banner_heading'] ?? ''}}" name="pracitioners_banner_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Subheading</label>
                                            <input type="text" value="{{$setting['pracitioners_banner_subheading'] ?? ''}}" name="pracitioners_banner_subheading" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Banner Background Image</label>
                                            <input type="file" class=" dropify dropify-event" name="pracitioners_banner_image" data-default-file="{{ asset($setting['pracitioners_banner_image'] ?? '')  }}">
                                        </div>
                                    </div>

                                    {{--  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Banner Right Image</label>
                                            <input type="file" class=" dropify dropify-event" name="pracitioners_banner_right_image" data-default-file="{{ asset($setting['pracitioners_banner_right_image'] ?? '')  }}">
                                        </div>
                                    </div>  --}}





                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Body Heading</label>
                                            <input type="text" value="{{$setting['pracitioners_body_heading'] ?? ''}}" name="pracitioners_body_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Body Subheading</label>
                                            <input type="text" value="{{$setting['pracitioners_body_subheading'] ?? ''}}" name="pracitioners_body_subheading" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    @for($i = 1; $i<=4; $i++)
                        @php
                            $head      = 'pracitioners_body_sec_'.$i.'_heading';
                            $subhead   = 'pracitioners_body_sec_'.$i.'_subheading';
                            $animate_1 = 'pracitioners_body_sec_'.$i.'_animate_1';
                            $animate_2 = 'pracitioners_body_sec_'.$i.'_animate_2';
                            $animate_3 = 'pracitioners_body_sec_'.$i.'_animate_3';
                            $animate_4 = 'pracitioners_body_sec_'.$i.'_animate_4';
                            $image_1   = 'pracitioners_body_sec_'.$i.'_image_1';
                            $image_2   = 'pracitioners_body_sec_'.$i.'_image_2';
                            $image_3   = 'pracitioners_body_sec_'.$i.'_image_3';
                        @endphp
                        <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="card-header card-header-primary pt-0">
                                    <h4 class="card-title">Body Section {{ $i }}</h4>
                                </div>
                                    <div class="col-md-12 mt-1">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Section Heading</label>
                                                <input type="text" class="form-control" name="pracitioners_body_sec_{{ $i }}_heading" value="{{$setting[$head] ?? ''}}">
                                                <label>Section Subheading</label>
                                                <input type="text" class="form-control" name="pracitioners_body_sec_{{ $i }}_subheading" value="{{$setting[$subhead] ?? ''}}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Animated Words</label>
                                                <input type="text" class="form-control" name="{{ $animate_1 }}" value="{{$setting[$animate_1] ?? ''}}">
                                                <input type="text" class="form-control" name="{{ $animate_2 }}" value="{{$setting[$animate_2] ?? ''}}">
                                                <input type="text" class="form-control" name="{{ $animate_3 }}" value="{{$setting[$animate_3] ?? ''}}">
                                                <input type="text" class="form-control" name="{{ $animate_4 }}" value="{{$setting[$animate_4] ?? ''}}">

                                            </div>
                                            <div class="col-sm-2">
                                                <label>Image 1</label>
                                                <input type="file" class=" dropify dropify-event" name="{{ $image_1 }}" data-default-file="{{ asset($setting[$image_1] ?? '')  }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Image 2</label>
                                                <input type="file" class=" dropify dropify-event" name="{{ $image_2 }}" data-default-file="{{ asset($setting[$image_2] ?? '')  }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Image 3</label>
                                                <input type="file" class=" dropify dropify-event" name="{{ $image_3 }}" data-default-file="{{ asset($setting[$image_3] ?? '')  }}">
                                            </div>



                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor





                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Practationer Testimonial Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" value="{{$setting['practationer_test_name'] ?? ''}}" name="practationer_test_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Designation</label>
                                            <input type="text" value="{{$setting['practationer_test_designation'] ?? ''}}" name="practationer_test_designation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$setting['practationer_test_desription'] ?? ''}}" name="practationer_test_desription" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label">Avatar</label>
                                            <input type="file" class=" dropify dropify-event" name="practationer_test_avatar"
                                            data-default-file="{{ asset($setting['practationer_test_avatar'] ?? '')  }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="btn-group pull-right mb-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

