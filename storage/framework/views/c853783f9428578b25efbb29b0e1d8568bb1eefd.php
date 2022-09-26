



<div class="mobile-navbar">

    <div class="clearfix">

        <div class="float-left">

            <a href="<?php echo e(route('index')); ?>"><img style="width: 120px;" src="<?php echo e(asset($setting['logo']) ?? ''); ?>" title="<?php echo e(env('APP_NAME')); ?>" alt="<?php echo e(env('APP_NAME')); ?>"></a>

        </div>

        <div class="float-right">

            <button class="btn btn-dark mr-2" data-toggle="canvas" data-target="#bs-canvas-left" aria-expanded="false" aria-controls="bs-canvas-left">&#9776;</button>

        </div>

    </div>

</div>









    <div id="bs-canvas-left" class="bs-canvas bs-canvas-anim bs-canvas-left position-fixed bg-light h-100">

        <header class="bs-canvas-header p-3 bg-success">

            <h4 class="d-inline-block text-light mb-0">CHWG</h4>

            <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>

        </header>

        <div class="bs-canvas-content">

            <div class="list-group">

              <a href="<?php echo e(route('index')); ?>" class="list-group-item">Home</a>

              <a href="<?php echo e(route('about.us')); ?>" class="list-group-item">About US</a>

              <a href="<?php echo e(route('our.mission')); ?>" class="list-group-item">our mission</a>

              <a href="<?php echo e(route('explore.homeopathy')); ?>" class="list-group-item">explore homeopathy</a>

              <a href="<?php echo e(route('find.homeopath')); ?>" class="list-group-item">find a homeopath</a>

              <a href="<?php echo e(route('shop.index')); ?>" class="list-group-item">Shop</a>



                <h6 class="mt-3 mb-1 ml-2">Shopping Cart</h6>

              <a href="#" class="list-group-item cursor-pointer" onclick="showMyCart()">

                    My Cart

                    <sup class="badge badge-dark p-1 cart-total" id="cart-total"><?php echo e(count(Cart::instance('shopping')->content())); ?></sup>

                </a>

                <h6 class="mt-3 mb-1 ml-2">Account</h6>



              <?php if(auth()->guard()->check()): ?>

                <a class="list-group-item" href="<?php echo e(route('redirect.dashboard')); ?>">Dashboard</a>

                <a class="list-group-item" href="<?php echo e(route('logout')); ?>">Logout</a>

              <?php else: ?>

                <a class="list-group-item" target="" href="<?php echo e(route('login')); ?>">Login</a>

                <a class="list-group-item" href="#" data-toggle="modal" data-target="#modalRegistration">Subscription</a>



              <?php endif; ?>





            </div>





        </div>

    </div>











<!--MAIN NAVBAR-->



<div class="header-content-bottom-all desktop-navbar">

    <div class="header-content-middle ">

        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <div class="logo text-left mt-3">

                        <a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset($setting['logo']) ?? ''); ?>" title="<?php echo e(env('APP_NAME')); ?>" alt="<?php echo e(env('APP_NAME')); ?>"></a>

                    </div>

                </div>

                <div class="col-lg-9">

                    <div class="header-content-menu">

                        <div id="sticky_nav">

                            <nav class="navbar navbar-expand-lg navbar-dark nav-main" id="navbar">

                                <div class="container-sticky">

                                    <a class="navbar-brand" href="<?php echo e(route('index')); ?>">

                                        <img src="<?php echo e(asset($setting['favicon']) ?? ''); ?>" style="width:40px" alt=""  class="logo-rotate">

                                    </a>

                                    <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">

                                        <ul class="navbar-nav nav-list-main">

                                            <li class="nav-item"><a href="<?php echo e(route('about.us')); ?>" class="nav-link">SOLUTIONS</a></li>

                                            <li class="nav-item"><a href="<?php echo e(route('our.mission')); ?>" class="nav-link">Our Mission</a></li>

                                            <li class="nav-item"><a href="<?php echo e(route('explore.homeopathy')); ?>" class="nav-link">Explore Homeopathy</a></li>

                                            <li class="nav-item"><a href="<?php echo e(route('find.homeopath')); ?>" class="nav-link">Find a homeopath</a></li>

                                            <li class="nav-item"><a href="<?php echo e(route('shop.index')); ?>" class="nav-link">Shop</a></li>



                                            <li class="nav-item dropdown">

                                                <a href="#" class="nav-link" data-toggle="dropdown" data-hover="dropdown">My Account</a>

                                                <div class="new-dropdown-menu dropdown-content my-account-menu">

                                                    <?php if(auth()->guard()->check()): ?>

                                                        <a href="<?php echo e(route('redirect.dashboard')); ?>">Dashboard</a>

                                                        <a href="<?php echo e(route('logout')); ?>">Logout</a>

                                                    <?php else: ?>

                                                        <a target="" href="<?php echo e(route('login')); ?>">Login</a>

                                                        <a href="#" data-toggle="modal" data-target="#modalRegistration">Sign Up</a>

                                                    <?php endif; ?>

                                                </div>

                                            </li>

                                            <li class="mini-cart-content nav-item">

                                                <a class="nav-link cursor-pointer" onclick="showMyCart()">

                                                        <span class="fa fa-shopping-cart"></span>

                                                        <sup class="badge badge-dark p-1 cart-total" id="cart-total"><?php echo e(count(Cart::instance('shopping')->content())); ?></sup></a>

                                            </li>



                                        </ul>

                                    </div>

                                </div>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>









<div class="modal fade" style="background-color:rgba(0, 0, 0, 0.9);" id="cartModalPopup" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog" style="max-width:90%" role="document">

    <div class="modal-content p-0" style="background:transparent;">

        <section class="shopping-cart">

            <?php echo $__env->make('front.shop.ajax.checkout_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </section>

        <div class="text-center mt-2">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            <a href="<?php echo e(route('shop.checkout')); ?>" class="btn btn-success">Go to Checkout</a>

        </div>



    </div>

  </div>

</div>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/components/navbar.blade.php ENDPATH**/ ?>