@extends('layouts.front')

@section('title', 'Homeopath Registration')

@section('content')

<header>

    <div class="wrapper">

        <div id="header_content" style="background:#dcf2fa url({{ asset('front/assets') }}/templates-assets/headerr/img/account.jpg) no-repeat 50% center;background-size: cover;">

            @include('front.components.navbar')

            <!--PAGE BANNER-->

            <div class="banner-box">

                <div class="banner-top text-center">

                    <div class="inner">

                        <h2 class="text-dark">Homeopath Registration</h2>

                        <p>Provide your correct credentials to register at CHWG</p>

                        <p class="cmp-button-row non-mobile-only">

                        <div class="right-box">

                            <div class="screenshot"></div>

                        </div>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>

<!--END HEADER-->







<section class="content mb-5" id="login">

    <div class="container custom-extra-top-style">
        <div class="row justify-content-center mb-4">
            <div class="col-xs-12 text-center">
                <img src="{{asset('uploads/img/17.png')}}" width="150">
                <br/>
                <p>We help you help others</p>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-6 text-center">

                <div class="panel panel-login">

                    <div class="panel-heading">

                        <div class="row justify-content-center mt-3">

                            <div class="col-xs-12 text-center">


                                <h3>Register your Remport Account</h3>

                            </div>

                        </div>

                        <hr>

                    </div>

                    <div class="panel-body">

                        <x-auth-validation-errors class="mb-4 text-left text-danger" :errors="$errors" />

                        <form method="post" action="{{ route('user.register') }}">

                            @csrf

                            <input type="hidden" name="role" value="homeopath">

                            <div class="form-group has-feedback">

                                <input name="name" class="form-control" placeholder="First Name*" type="text" required="">

                                <span class="fa fa-user form-control-feedback"></span>

                            </div>

                            <div class="form-group has-feedback">

                                <input name="last_name" class="form-control" placeholder="Last Name*" type="text" required="">

                                <span class="fa fa-user form-control-feedback"></span>

                            </div>



                            <div class="form-group has-feedback">

                                <input name="email" id="email" tabindex="1" class="form-control" placeholder="Email address*" type="email" required="">

                                <span class="fa fa-inbox form-control-feedback"></span>

                            </div>





                            <div class="form-group has-feedback">

                                <input name="password" id="password" tabindex="2" class="form-control" placeholder="Password*" type="password" required="">

                                <span class="fa fa-lock form-control-feedback"></span>

                            </div>

                            <div class="form-group has-feedback">

                                <input name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Retype Password*" type="password" required="">

                                <span class="fa fa-lock form-control-feedback"></span>

                            </div>

                            <div class="form-group has-feedback">

                                <input class="form-control" name="phone" type="number" min="0" placeholder="Phone">

                                <span class="fa fa-phone form-control-feedback"></span>

                            </div>
                            <div class="form-group">

                                <select class="form-control input__country" id="commoditySel" name="country" required>

                                    <option value="Canada">Canada</option>
                                  {{-- @foreach(getCountries() as $country)

                                      <option value="{{ $country->name }}">{{ $country->name }}</option>

                                  @endforeach --}}

                                </select>

                            </div>


                            

                            <div class="form-group has-feedback">
                                <select name="province" class="form-control">
                                    <option value="">Select Province</option>
                                    <option value="Alberta">Alberta</option>
                                    <option value="British Columbia">British Columbia</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="New Brunswick">New Brunswick</option>
                                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                    <option value="Nova Scotia">Nova Scotia</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Prince Edward Island">Prince Edward Island</option>
                                    <option value="Quebec">Quebec</option>
                                    <option value="Saskatchewan">Saskatchewan</option>
                                    <option value="Northwest Territories">Northwest Territories</option>
                                    <option value="Nunavut">Nunavut</option>
                                    <option value="Yukon">Yukon</option>
                                </select>

                            </div>

                            {{-- <div class="form-group has-feedback">

                                <input name="state" class="form-control" id="commodityLab" placeholder="State*" type="text" required="">

                                <span class="fa fa-globe form-control-feedback"></span>

                            </div> --}}



                            <div class="form-group has-feedback">

                                    <input class="form-control zip_code" name="zip_code" type="text" placeholder="Zip code/Postal code*" required="">

                                    <span class="fa fa-list form-control-feedback"></span>

                            </div>





                            <div class="form-group">

                                <div class="row justify-content-center">

                                    <div class="col-sm-6 text-center">

                                        <button type="submit" class="form-control btn btn-secondary">Register my account</button>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="text-center">

                                            <a href="{{ route('login') }}" tabindex="5" class="register-new-user">I already have an account</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>









@endsection

@section('js')

<script>
    // $(function() {
    //     $('#commoditySel').change(function() {
    //       if ($('#commoditySel').val() == 'Canada') {
    //         $('#commodityLab').attr("placeholder", "Province*");
    //       } else {
    //         $('#commodityLab').attr("placeholder", "State*");
    //       }
    //     });
    //   });
</script>

@endsection

