<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><?php if(count($notif_count)>0): ?><span class="badge badge-pill badge-primary badge-up "><?php echo e(count($notif_count)); ?></span> <?php else: ?> <span class="badge badge-pill badge-primary badge-up "></span> <?php endif; ?></a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
        <li class="dropdown-menu-header">
            <div class="dropdown-header m-0 p-1">
                <h3 class="white"></h3><span class="notification-title">New Notifications</span>
            </div>
        </li>
        <?php $__currentLoopData = $notif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="scrollable-container media-list ps">
                <?php if($notification->is_read==1): ?>
                    <?php if($notification->type=='message'): ?>
                        <a class="d-flex justify-content-between"  href="javascript:void(0)">

                            <a class="d-flex justify-content-between notification_button" data-page="messages" data-id="<?php echo e($notification->id); ?>" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left"><i class="fa fa-envelope-o font-medium-5 secondary"></i></div>
                                    <div class="media-body">
                                        <h6 class="secondary media-heading"><?php echo e($notification->count.' '.$notification->notification_text); ?></h6><small class="notification-text"></small>
                                    </div><small>
                                        <time class="media-meta secondary" datetime="2015-06-11T18:29:20+08:00"><?php echo e($notification->updated_at->diffForHumans()); ?></time></small>
                                </div>
                            </a><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>

                        </a>
                    <?php else: ?>
                        <a class="d-flex justify-content-between" href="javascript:void(0)">

                            <a class="d-flex justify-content-between notification_button" data-id="<?php echo e($notification->id); ?>" href="<?php echo e(route('social.connection.profile',\App\Models\User::find($notification->sender_id)->user_name??'')); ?>" target="_blank">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left"><i class="fa fa-users font-medium-5 secondary"></i></div>
                                    <div class="media-body">
                                        <h6 class="secondary media-heading"><?php echo e($notification->notification_text); ?></h6><small class="notification-text"></small>
                                    </div><small>
                                        <time class="media-meta secondary" datetime="2015-06-11T18:29:20+08:00"><?php echo e($notification->updated_at->diffForHumans()); ?></time></small>
                                </div>
                            </a><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>

                        </a>
                    <?php endif; ?>
                <?php else: ?>

                    <?php if($notification->type=='message'): ?>
                        <a class="d-flex justify-content-between"  href="javascript:void(0)">

                            <a class="d-flex justify-content-between notification_button" data-page="messages" data-id="<?php echo e($notification->id); ?>" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left"><i class="fa fa-envelope-o font-medium-5 warning"></i></div>
                                    <div class="media-body">
                                        <h6 class="warning media-heading"><?php echo e($notification->count.' '.$notification->notification_text); ?></h6><small class="notification-text"></small>
                                    </div><small>
                                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00"><?php echo e($notification->updated_at->diffForHumans()); ?></time></small>
                                </div>
                            </a><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>

                        </a>
                    <?php else: ?>
                        <a class="d-flex justify-content-between" href="javascript:void(0)">

                            <a class="d-flex justify-content-between notification_button" data-id="<?php echo e($notification->id); ?>" href="<?php echo e(route('social.connection.profile',\App\Models\User::find($notification->sender_id)->user_name??'')); ?>" target="_blank">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left"><i class="fa fa-users font-medium-5 success"></i></div>
                                    <div class="media-body">
                                        <h6 class="success media-heading"><?php echo e($notification->notification_text); ?></h6><small class="notification-text"></small>
                                    </div><small>
                                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00"><?php echo e($notification->updated_at->diffForHumans()); ?></time></small>
                                </div>
                            </a><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>

                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</li>


<style>
    .font-medium-5{
        border-radius:50%;
        padding: 7px;
        background-color: #d6d2d2;
    }
    .media-body{
        padding-top: 8px;
    }
    small{
        padding-top: 10px;
    }
</style>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/notification.blade.php ENDPATH**/ ?>