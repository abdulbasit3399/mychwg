<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow homeopath-sidebar myclinic" data-scroll-to-active="true">



    <!--<div class="shadow-bottom"></div>-->

    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.dashboard')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.dashboard')); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>

            <li class="nav-item"><a href="<?php echo e(route('social.index')); ?>"><i class=""></i><img src="<?php echo e(asset('uploads/img/mflogo.png')); ?>" width="137"></a></li>



            <li class="nav-item has-sub">

                <a href="#" class="font-weight-bold"><i class=""></i><img src="<?php echo e(asset('uploads/img/16.png')); ?>" width="150">

                     <i class="fas fa-chevron-down float-right"></i>

                </a>

                    <ul class="menu-content">

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.services.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.services.index')); ?>"><i class="fa fa-server"></i>Services</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.settings.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.settings.index')); ?>"><i class="fas fa-gear"></i>Settings</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.link.account')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.link.account')); ?>"><i class="fas fa-money"></i>Link Account</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.resources.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.resources.index')); ?>"><i class="fas fa-book"></i>Resources</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.finance.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.finance.index')); ?>"><i class="fas fa-hand-holding-usd"></i>Finance</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.documents.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.documents.index')); ?>"><i class="fas fa-folder"></i>Documents</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.customers.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.customers.index')); ?>"><i class="fas fa-users"></i>Customers</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.appointments.index')); ?>"><i class="far fa-calendar-check"></i>Appointments</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.calendar')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.appointments.calendar')); ?>"><i class="far fa-calendar-o"></i>Calendar</a></li>

                        <li class="<?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'homeopath.appointments.schedule')): ?> active <?php endif; ?>"><a href="<?php echo e(route('homeopath.appointments.schedule')); ?>"><i class="far fa-calendar-alt"></i>My Schedule</a></li>



                        



                    </ul>

            </li>

            <li class="nav-item"><a href="<?php echo e(route('index')); ?>" target="_blank"><i class="fa fa-home"></i>Visit Site</a></li>





        </ul>

    </div>

</div><?php /**PATH C:\laragon\www\mychwg\resources\views/homeopath/components/sidebar.blade.php ENDPATH**/ ?>