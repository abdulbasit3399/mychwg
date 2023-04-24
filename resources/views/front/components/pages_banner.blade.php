<header>
    <div class="wrapper">
        <!--<div id="header_content" style="background:#dcf2fa url('{{ asset($setting['other_inner_page_banner_image'] ?? '')  }}') no-repeat 50% center;background-size: cover;">-->
        <div id="header_content" style="background:#D9EEF2">
            @include('front.components.navbar')

            <!--PAGE BANNER-->



            <div class="banner-box">
                <div class="banner-top text-center">
                    <div class="inner2 text-white">
                        <h2 class="txt60 text-dark quarto-semibold">{{ $heading ?? '' }}</h2>
                        <p class="text-dark gotham-black">{{ $description ?? '' }}</p>
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
