<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto mt-0"><a class="navbar-brand mt-0" style="padding-top: 10px;" href="<?php echo e(route('index')); ?>">
                    <h2 class="brand-text mb-0"><img src="<?php echo e(asset($setting['logo'] ?? '')); ?>" style="width: 120px;" alt=""></h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.dashboard')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="feather icon-home"></i>Dashboard</a></li>




            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_members')): ?>
                <li class=" navigation-header"><span>Members Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.member.index')): ?>  <?php endif; ?>"><a href="<?php echo e(route('admin.member.index')); ?>?member=<?php echo e('advocate'); ?>"><i class="feather icon-briefcase"></i>Advocate</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.member.index')): ?>  <?php endif; ?>"><a href="<?php echo e(route('admin.member.index')); ?>?member=<?php echo e('homeopath'); ?>"><i class="feather icon-list"></i>Homeopath</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.member.index')): ?> <?php endif; ?>"><a href="<?php echo e(route('admin.member.index')); ?>?member=<?php echo e('user'); ?>"><i class="feather icon-user"></i>End User</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.badge.requests')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.badge.requests')); ?>"><i class="feather icon-award"></i>Badge Requests <span class="badge badge-danger"><?php echo e(badgeRequests()); ?></span></a> </li>
            <?php endif; ?>



            <li class=" navigation-header"><span>Others</span></li>




            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_settings')): ?>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.refund.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.refund.index')); ?>"><i class="fa fa-dollar"></i>Refund Amount</a></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_settings')): ?>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.setting.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.setting.index')); ?>"><i class="feather icon-settings"></i>Settings</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.email.invitation')): ?>  <?php endif; ?>"><a href="<?php echo e(route('admin.email.setting')); ?>"><i class="feather icon-mail"></i>Email Setting</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'newsletter.email.list')): ?>  <?php endif; ?>"><a href="<?php echo e(route('newsletter.email.list')); ?>"><i class="feather icon-mail"></i>Newsletter Management</a></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_services')): ?>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.services.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.services.index')); ?>"><i class="feather icon-server"></i>Services Theme</a></li>
            <?php endif; ?>

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_donations')): ?>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.donations')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.donations')); ?>"><i class="feather icon-dollar-sign"></i>Donations</a></li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_shop')): ?>
                <li class=" navigation-header"><span>Shop Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.shop.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.shop.index')); ?>"><i class="feather icon-briefcase"></i>Shop</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.shop.options')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.shop.options')); ?>"><i class="feather icon-align-justify"></i>Product Options</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.shop.orders')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.shop.orders')); ?>">
                <i class="feather icon-circle"></i>Orders <span class="badge badge-danger"><?php echo e(shopPendingOrders()); ?></span>
            </a></li>

            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_finance')): ?>
                <li class=" navigation-header"><span>Finance Department</span></li>

                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.subscriptions.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.subscriptions.index')); ?>"><i class="feather icon-users"></i>Subscriptions</a></li>

                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.finance.services.transaction')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.finance.services.transaction')); ?>"><i class="feather icon-dollar-sign"></i>Services Transaction</a></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.finance.homeopath.revenue')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.finance.homeopath.revenue')); ?>"><i class="feather icon-dollar-sign"></i>Homeopath Revenue</a></li>

                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.finance.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.finance.index')); ?>"><i class="feather icon-dollar-sign"></i>Finance Settings</a></li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('homeopath_library')): ?>
                <li class=" navigation-header"><span>Homeopath Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.Homeopath.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.homeopath.index')); ?>"><i class="feather icon-target"></i>Explore Homeopath</a></li>
            <?php endif; ?>








            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_roles')): ?>
                <li class=" navigation-header"><span>Authorization Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.roles.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.roles.index')); ?>"><i class="feather icon-zap"></i>Roles</a></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_teams')): ?>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.teams.index')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.teams.index')); ?>"><i class="feather icon-user"></i>Teams</a></li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_inquiries')): ?>
                <li class=" navigation-header"><span>Contact Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.inquiries')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.inquiries')); ?>"><i class="feather icon-info"></i>Inquiries</a></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('browse_reports')): ?>
                <li class=" navigation-header"><span>Reported Department</span></li>
                <li class="nav-item <?php if (\Illuminate\Support\Facades\Blade::check('routeis', 'admin.reports')): ?> active <?php endif; ?>"><a href="<?php echo e(route('admin.reports')); ?>"><i class="feather icon-flag"></i>Reported Users</a></li>
            <?php endif; ?>




        </ul>
    </div>
</div>
<?php /**PATH C:\laragon\www\mychwg\resources\views/admin/components/sidebar.blade.php ENDPATH**/ ?>