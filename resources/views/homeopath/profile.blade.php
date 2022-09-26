@extends('layouts.homeopath')
@section('title','homeopath Dashbaord')
@section('heading','Profile Management')


@section('css')
<style type="text/css">

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
@endsection


@section('content')

<!-- users edit start -->
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h3>Profile Information</h3>
                <hr>
                <div class="">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#account">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#billing">Billing Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#change_password">Change Password</a>
                        </li>
                        @if(Auth::user()->role=='homeopath')
                            <li class="nav-item">
                                <a class="nav-link"  data-toggle="modal" data-target="#serviceProfileModal">Homeopath Avatar</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <form method="post" action="{{ route('homeopath.update.profile') }}" enctype="multipart/form-data" id="profile-form" class="cmxform">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Profile Avatar</label>
                                        <input type="file" name="image" class="form-control dropify" data-default-file="{{asset(Auth::User()->avatar ?? '')}}">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="name" value="{{Auth::User()->name ?? ''}}" required
                                                    data-validation-required-message="This name field is required">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" placeholder="email"
                                                    name="email" value="{{Auth::User()->email}}" required
                                                    data-validation-required-message="This email field is required">
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Phone</label>
                                                <input type="number" min="0" class="form-control" name="phone"
                                                    placeholder="Phone" value="{{Auth::User()->phone}}" required
                                                    data-validation-required-message="This phone field is required">
                                                    @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit"
                                            class="btn btn-relief-primary ">Save
                                            Changes</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>

                        <div class="tab-pane" id="billing" aria-labelledby="account-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-2 offset-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <b>Payment Method</b>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-8">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{($subscription)?'Stripe':'N/A'}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2 offset-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <b>Subscription Date</b>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-8">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{($subscription )?$subscription->updated_at:'N/A'}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2 offset-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <b>Choosed Plan</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>{{($subscription )?ucfirst($subscription->plan_interval).'ly':'N/A'}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 offset-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <b>Status</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <div class="controls">
                                                 <label>{{($subscription && $subscription->stripe_status)?ucfirst($subscription->stripe_status):'N/A'}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 offset-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <b>Next Billing</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <div class="controls">
                                                @php($end_date =($subscription && $subscription->ends_at)?$subscription->ends_at:($subscription && auth()->user()->trial_ends_at?auth()->user()->trial_ends_at:'N/A'))
                                                <label>{{$end_date}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($subscription)
                                    @if($subscription->stripe_status=='active' || $subscription->stripe_status=='on_trial')
                                        <div class="col-2 offset-4">
                                            <div class="text-right">
                                                <button
                                                class="btn btn-danger cancel_sub">Cancel Subscription <i class="btn_loader fa fa-spinner fa-spin d-none"></i></button>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-2 offset-4">
                                            <div class="text-right">
                                                <a href="{{ route('subscription.payment') }}" class="btn btn-relief-primary">Renew  Subscription</a>
                                            </div>
                                        </div>
                                    @endif
                                    @endif
                                    </div>

                            <!-- users edit account form ends -->
                        </div>

                        <div class="tab-pane" id="change_password" aria-labelledby="password-tab" role="tabpane2">
                            <form method="post" action="{{ route('homeopath.update.password') }}" enctype="multipart/form-data" id="profile-form" class="cmxform">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-float-label">
                                            <div class="controls">
                                                <label for="account-old-password">Old Password</label>
                                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="account-old-password" placeholder="Old Password" data-validation-message="This old password field is">
                                                @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-float-label">
                                            <div class="controls">
                                                <label for="account-new-password">New Password</label>
                                                <input id="user-password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" data-validation-message="The password field is" minlength="6">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-float-label">
                                            <div class="controls">
                                                <label for="account-retype-new-password">Retype New Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-message="The Confirm password field is" minlength="6">
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">-->
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-relief-primary mr-sm-1 mb-1 mb-sm-0">
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                             <!-- users edit account form ends -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<div class="modal fade" id="serviceProfileModal" tabindex="-1" role="dialog" aria-labelledby="serviceProfileModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
            <form action="{{route('homeopath.services.page.image.save')}}" method="post" enctype="multipart/form-data">

                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="serviceProfileModalLable">Select Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mt-2">
                            @csrf
                             <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="form-group mx-auto">
                                <input type="file" accept="image/*" name="image" required="" class="form-control dropify" data-default-file="{{asset(Auth::user()->HomeopathProfile->service_profile_img)}}">
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
            </form>

  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.cancel_sub').on('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want cancel the subscription!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $('.btn_loader').removeClass('d-none');
                $('.cancel_sub').attr('disabled','true');
                $.ajax({
                    url: "{{route('subscription.cancel')}}",
                    type: "GET",
                    dataType: "html",
                    async:true,
                    success: function (response) {
                        response = JSON.parse(response);
                        if(response.success=='1') {
                            Swal.fire(
                                {
                                    type: "success",
                                    icon: "success",
                                    title: 'Success!',
                                    text: response.msg,
                                    confirmButtonClass: 'btn btn-success',
                                }
                            )
                            $('.cancel_sub').hide();
                        }else{
                            Swal.fire(
                                {
                                    icon: "error",
                                    type: "error",
                                    title: 'Failed!',
                                    text: response.msg,
                                    confirmButtonClass: 'btn btn-success',
                                }
                            )
                        }
                        $('.cancel_sub').removeAttr('disabled');
                        $('.btn_loader').addClass('d-none');
                    },
                    error: function (response) {
                        $('.cancel_sub').removeAttr('disabled');
                        $('.btn_loader').addClass('d-none');

                        Swal.fire(
                            {
                                icon: "error",
                                type: "error",
                                title: 'Error occured. Try again!',
                                confirmButtonClass: 'btn btn-warning',
                            }
                        )

                    }
                });
            }
        })
    });
</script>
<!-- users edit ends -->

@endsection
