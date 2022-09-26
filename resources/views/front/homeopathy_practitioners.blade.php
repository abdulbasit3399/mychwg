@extends('layouts.front')

@section('title', $setting['pracitioners_title'] ?? '')

@section('content')

<header>

    <div class="wrapper">

        <div id="header_content" style="background:#dcf2fa url('{{ asset($setting['pracitioners_banner_image'] ?? '')  }}') no-repeat 50% center;background-size: cover; height: 85vh;">

            @include('front.components.navbar')

            <!--PAGE BANNER-->

            <div class="container">

                <div class="row align-center">

                    <div class="col-md-6">

                        <div class="hero__copy">

                            <h1>{{$setting['pracitioners_banner_heading'] ?? ''}}</h1>

                            <p>{!!$setting['pracitioners_banner_subheading'] ?? ''!!}</p>

                            <p class="cmp-button-row non-mobile-only">

                                <a href="{{ route('find.homeopath') }}" class="btn btn-primary text-white">Try for Free</a>

                            </p>

                            <p>Or <a href="{{ route('register.homeopath') }}">start your subscription</a> today.</p>


                            

                            @include('auth.registration_modal')



                            







                    </div>

                </div>

                <div class="col-md-6">

                    <div class="right-box">

                        <div class="">

                            <img src="{{ asset($setting['pracitioners_banner_right_image'] ?? '')  }}" alt="">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</header>

<!--END HEADER-->

<!--MAIN CONTENT SECTION-->

<section class="content">

<!-- second section -->

<div class="container mt-5 pb-5">

    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

            <section id="comp-kp4dmpkp" class="JSM9k">

                <div id="bgLayers_comp-kp4dmpkp" class="X-jRX">

                    <div data-testid="colorUnderlay" class="mlsxv _22Lsw"></div>

                    <div id="bgMedia_comp-kp4dmpkp" class="_1J6n9"></div>

                            </div>

                            <div data-testid="columns" class="_2EoGw">

                                <div id="comp-kp4dmpks" class="_31Ne5">

                                    <div id="bgLayers_comp-kp4dmpks" class="X-jRX">

                                        <div data-testid="colorUnderlay" class="mlsxv _22Lsw"></div>

                                        <div id="bgMedia_comp-kp4dmpks" class="_1J6n9"></div>

                                    </div>

                                    <div data-mesh-id="comp-kp4dmpksinlineContent" data-testid="inline-content" class="">

                                        <div data-mesh-id="comp-kp4dmpksinlineContent-gridContainer" data-testid="mesh-container-content">

                                            <div id="comp-kp4dmpku" class="_2bafp" data-testid="richTextElement">

                                                <p class="font-weight-bold" style="font-size:40px; line-height:1.1em; text-align:center"><span style="font-size:40px"><span style="color:#414141">

                                                    {{$setting['pracitioners_body_heading'] ?? ''}}

                                                </p>

                                </div>

                                <div id="comp-kp4dmpkw" class="_2bafp" data-testid="richTextElement">

                                    <p class="font_7" style="font-size:18px; line-height:1.1em; text-align:center">{{$setting['pracitioners_body_subheading'] ?? ''}}</p>

                        </div>

                    </div>

                </div>

            </div>

            </div>

            </section>

        </div>

        <div class="col-md-2"></div>

    </div>

</div>

<!-- end -->



<!-- 1st section -->

<div class="pb-5" style="background-color: rgb(231, 228, 228);">

    <p class="font_7 pt-3" style="font-size:25px; text-align:center;">

        <strong>{{$setting['pracitioners_body_sec_1_heading'] ?? ''}}</strong>

        <span id="directory_changingword">{{$setting['pracitioners_body_sec_1_animate_1'] ?? ''}}</span> > </span>

    </p>

    <p style="font-size:15px; text-align:center"><span style="font-size:15px">{{$setting['pracitioners_body_sec_1_subheading'] ?? ''}}</p>

    <br />

    <div class="container">

        <div class="row">

            <div class="col-md-12">

            <div id="carouselExampleIndicators" class="carousel slide w-75 mx-auto" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_1_image_1'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_1_image_2'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_1_image_3'] ?? '')  }}"></div>

            </div>



            </div>

            </div>

        </div>

    </div>

</div>

<!-- end 1st section -->





<!-- 2nd section -->

<div class="pb-5">

    <p class="font_7 pt-3" style="font-size:25px; text-align:center;">

        <strong>{{$setting['pracitioners_body_sec_2_heading'] ?? ''}}</strong>

        <span id="eClinic_changingword">{{$setting['pracitioners_body_sec_2_animate_1'] ?? ''}}</span> > </span>

    </p>

    <p style="font-size:15px; text-align:center"><span style="font-size:15px">{{$setting['pracitioners_body_sec_2_subheading'] ?? ''}}</p>

    <br />

    <div class="container">

        <div class="row">

            <div class="col-md-12">

            <div id="carouselExampleIndicators2" class="carousel slide w-75 mx-auto" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>

                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>

                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_2_image_1'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_2_image_2'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_2_image_3'] ?? '')  }}"></div>

            </div>



            </div>

            </div>

        </div>

    </div>

</div>

<!-- end 2nd section -->







<!-- 3rd section -->

<div class="pb-5" style="background-color: rgb(231, 228, 228);">

    <p class="font_7 pt-3" style="font-size:25px; text-align:center;">

        <strong>{{$setting['pracitioners_body_sec_3_heading'] ?? ''}}</strong>

        <span id="system_changingword">{{$setting['pracitioners_body_sec_3_animate_1'] ?? ''}}</span> > </span>

    </p>

    <p style="font-size:15px; text-align:center"><span style="font-size:15px">{{$setting['pracitioners_body_sec_3_subheading'] ?? ''}}</p>

    <br />

    <div class="container">

        <div class="row">

            <div class="col-md-12">

            <div id="carouselExampleIndicators3" class="carousel slide w-75 mx-auto" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>

                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>

                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_3_image_1'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_3_image_2'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_3_image_3'] ?? '')  }}"></div>

            </div>



            </div>

            </div>

        </div>

    </div>

</div>

<!-- end 3rd section -->





<!-- 4th section -->

<div class="pb-5">

    <p class="font_7 pt-3" style="font-size:25px; text-align:center;">

        <strong>{{$setting['pracitioners_body_sec_4_heading'] ?? ''}}</strong>

        <span id="automation_changingword">{{$setting['pracitioners_body_sec_4_animate_1'] ?? ''}}</span> > </span>

    </p>

    <p style="font-size:15px; text-align:center"><span style="font-size:15px">{{$setting['pracitioners_body_sec_4_subheading'] ?? ''}}</p>

    <br />

    <div class="container">

        <div class="row">

            <div class="col-md-12">

            <div id="carouselExampleIndicators4" class="carousel slide w-75 mx-auto" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators4" data-slide-to="0" class="active"></li>

                <li data-target="#carouselExampleIndicators4" data-slide-to="1"></li>

                <li data-target="#carouselExampleIndicators4" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_4_image_1'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_4_image_2'] ?? '')  }}"></div>

                <div class="carousel-item"><img class="d-block w-100" src="{{ asset($setting['pracitioners_body_sec_4_image_3'] ?? '')  }}"></div>

            </div>



            </div>

            </div>

        </div>

    </div>

</div>

<!-- end 4th section -->





<!-- bottom section -->

<div class="bg" style="background-color: rgb(231, 228, 228);">

<div class="container mt-4">

<div class="row">

<div class="col-md-6">

<div class="text-center">

<img src="{{ asset($setting['practationer_test_avatar'] ?? '')  }}" alt="Practationer" class="rounded-image mt-4 mb-4" />

</div>

</div>

<div class="col-md-6 mt-5 ">

<div id="comp-kp4dmpp8" class="_2bafp" data-testid="richTextElement">

<br />

<p class="font_7" style="font-size:15px"><span style="font-weight:bold"><span style="font-family:poppins-extralight,poppins,sans-serif"><span style="font-size:15px"><span class="color_20">"{{$setting['practationer_test_desription'] ?? ''}}"</span></span>

</span>

</span>

</p>

</div>

<div id="comp-kp4dmpp91" class="_2bafp" data-testid="richTextElement">

<p class="font_7" style="font-size:20px"><span style="color:#008AFC;"><span style="font-family:poppins-semibold,poppins,sans-serif; font-weight:700">{{$setting['practationer_test_name'] ?? ''}}</span></span>

</p>

</div>

<div id="comp-kp4dmppc" class="_2bafp" data-testid="richTextElement">

<p class="font_7" style="font-size:12px"><span class="color_22"><span style="font-size:12px"><span style="font-family:poppins-semibold,poppins,sans-serif; font-weight:700">{{$setting['practationer_test_designation'] ?? ''}}</span></span>

</span>

</p>

</div>

</div>

</div>

</div>

</div>

</section>











@section('js')

<script type="text/javascript">







    (function(){

      var words = [

          '{{$setting['pracitioners_body_sec_1_animate_1'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_1_animate_2'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_1_animate_3'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_1_animate_4'] ?? ''}}'

          ], i = 0;

      setInterval(function(){

          $('#directory_changingword').fadeOut(function(){

              $(this).html(words[i=(i+1)%words.length]).fadeIn();

          });

      }, 3000);

        

  })();





    (function(){

      var words = [

          '{{$setting['pracitioners_body_sec_2_animate_1'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_2_animate_2'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_2_animate_3'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_2_animate_4'] ?? ''}}'

          ], i = 0;

      setInterval(function(){

          $('#eClinic_changingword').fadeOut(function(){

              $(this).html(words[i=(i+1)%words.length]).fadeIn();

          });

      }, 3000);

        

  })();





    (function(){

      var words = [

          '{{$setting['pracitioners_body_sec_3_animate_1'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_3_animate_2'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_3_animate_3'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_3_animate_4'] ?? ''}}'

          ], i = 0;

      setInterval(function(){

          $('#system_changingword').fadeOut(function(){

              $(this).html(words[i=(i+1)%words.length]).fadeIn();

          });

      }, 3000);

        

  })();



  

    (function(){

      var words = [

          '{{$setting['pracitioners_body_sec_4_animate_1'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_4_animate_2'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_4_animate_3'] ?? ''}}',

          '{{$setting['pracitioners_body_sec_4_animate_4'] ?? ''}}'

          ], i = 0;

      setInterval(function(){

          $('#automation_changingword').fadeOut(function(){

              $(this).html(words[i=(i+1)%words.length]).fadeIn();

          });

      }, 3000);

        

  })();



  



  











</script>

@endsection