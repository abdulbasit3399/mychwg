<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">

        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="site-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset($setting['logo'] ?? '')  }}"></a>
                    </div>
                    <div class="m-auto float-left bookmark-wrapper d-flex align-items-center">

                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto "><a class="nav-link nav-menu-main menu-toggle hidden-xs " href="#"><i class="ficon feather icon-menu "></i></a></li>
                        </ul>


                    </div>

                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link pb-0" href="#" data-toggle="dropdown">
                                <span class="user-nav pr-4 " style="padding-left: 5px;">
                                    <span class="user-nav-inner">
                                        <img src="{{ asset(Auth::user()->avatar) }}" class="round float-left" style="margin-right: 10px;" height="30" width="30"> 
                                        <h5 class="m-0 font-weight-bold text-primary">{{ Auth::user()->name }}</h5>
                                        <span class="text-success d-block">{{ Auth::user()->role }}</span>
                                    </span>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right mt-0">
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="feather icon-user"></i>Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="feather icon-power"></i> Logout</a>
                        </div>

                        </li>

                    </ul>                </div>
            </div>
        </div>
    </nav>


    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper mobile-sidebar">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-container main-menu-content">
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html"><i class="feather icon-shopping-cart"></i>eCommerce</a></li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html"><i class="feather icon-shopping-cart"></i>eCommerce</a></li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html"><i class="feather icon-shopping-cart"></i>eCommerce</a></li>
                    <li data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html"><i class="feather icon-shopping-cart"></i>eCommerce</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu