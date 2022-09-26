<style type="text/css">
    .buttom-left {
  position: absolute;
  top: 10%;
  left: 16px;
  color: #000000;
  background-color:white;
  padding: 5px;
  border-radius: 4px;
  width: 50%;
  height: 60vh;
  cursor: pointer;
  overflow: auto;
}
.centered {
  position: absolute;
  top: 50%;
  left: 35%;
  transform: translate(-50%, -50%);
}
.event-bg-img{
    width: 100%;
    height: 70vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.add_event_icon {
    padding: 2px !important;
    border-radius: 100px;
    width: 24px;
    height: 24px;
    cursor: pointer;
}

</style>
<div class="row">
    <div class="col-lg-12">
        <?php echo $__env->make('vendor.social-network.components.social_network_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body py-1">

                <div class="row">
                    <div class="col-sm-6 m-auto">
                        <h3 class="p-0 m-0 font-weight-bold">Upcoming Event(s)</h3>
                    </div>

                    <div class="col-sm-6 text-right events-buttons main-clickable-links">
                    <?php if(Auth::user()->role=='advocate'): ?>
                          <a data-page="events-create" class="text-center" data-toggle="modal" data-target="#eventModal" title="Events"><i class="fas fa-plus bg-primary text-white add_event_icon"></i></a>
                        <?php endif; ?>
                        <a data-page="events" class="events" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fas fa-th-large"></i></a>
                        <a data-page="events_calendar" class="events_calendar" data-toggle="tooltip" data-placement="top" title="Calendar View"><i class="fas fa-calendar-alt"></i></a>
                    </div>

                </div>


            </div>
        </div>

        <div class="render-events">


                <!-- <?php $__empty_1 = true; $__currentLoopData = upcomingEvents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="item p-0 grid-event" data-description="<?php echo e($item->description); ?>" data-category="<?php echo e($item->category); ?>" data-venue="<?php echo e($item->venue); ?>" data-venue="<?php echo e($item->location); ?>">
                    <div class="img-container">
                        <img src="<?php echo e(asset($item->thumbnail)); ?>" class="event-img">
                        <div class="bottom-left-text">
                            <h2><?php echo e($item->title); ?></h2>
                            <span>
                            <?php echo e($item->eventTimings[0]->date ?? ''); ?>&nbsp;
                            <?php echo e($item->eventTimings[0]->time ?? ''); ?>

                             &nbsp; <i class="fas fa-arrows-alt-h"></i> &nbsp;
                            <?php echo e($item->type); ?>

                     </span>
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center">
                        <h3 class="alert alert-warning">No upcoming events are available right now!</h3>
                    </div>
                <?php endif; ?> -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <?php $__empty_1 = true; $__currentLoopData = upcomingEvents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


<?php
$d=$item->eventTimings()->where('event_id',$item->id)->first()->id;
$req_exist=Auth::user()->eventRequests()->where('event_timing_id',$d)->first();
?>
                            <div class="card">
                                <div class="card-body event-bg-img" style="background-image: url('<?php echo e(asset($item->thumbnail)); ?>')">


                                        <div class="buttom-left pl-1">
                                            <h2 class="text-dark font-weight-bold"><?php echo e($item->title); ?></h2>
                                            <span class="font-weight-bold">
                                            <?php echo e($item->eventTimings[0]->date ?? ''); ?>&nbsp;
                                            <?php echo e($item->eventTimings[0]->time ?? ''); ?>

                                             &nbsp; <i class="fas fa-arrows-alt-h"></i> &nbsp;
                                            <?php echo e($item->type); ?>

                                            </span>
                                            <p class="text-dark mt-2"><span class="font-weight-bold">Category:</span> <?php echo e($item->category??''); ?></p>
                                            <?php if($item->type != "virtual"): ?>
                                            
                                            <p class="text-dark mt-1"><span class="font-weight-bold">Venue:</span> <?php echo e($item->venue??''); ?></p>
                                            <p class="text-dark mt-1"><span class="font-weight-bold">Location:</span> <?php echo e($item->location??''); ?></p>
                                            <?php endif; ?>
                                            <p class="text-dark mt-1 event-desc"><span class="font-weight-bold">Description:</span><?php echo e(Str::limit($item->description,320,'...')); ?></p>
                                            <div class="text-center">
                                                <form action="<?php echo e(route('social.event.request')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="timing" value="<?php echo e($item->eventTimings[0]->time??0); ?>">
                                                <input type="hidden" name="date" value="<?php echo e($item->eventTimings[0]->date??0); ?>">
                                                <input type="hidden" name="id" value="<?php echo e(Crypt::encrypt($item->id)); ?>">
                                                <?php if(Auth::id()!=$item->user_id && !$req_exist): ?>
                                                <button type="submit" class=" btn btn-primary"  href="#">Join</a>
                                                <?php endif; ?>
                                                </form>
                                            </div>

                                        </div>


                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center">
                                <h3 class="alert alert-warning">No upcoming events are available right now!</h3>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

        </div>


    </div>
</div>





<script>

    $(document).on('click', '.grid-event', function() {

        $modal = $('#modalGridEventDetail');


        $('.event-grid-category').text($(this).data('category'));


        $('.event-grid-venue').text($(this).data('venue'));
        $('.event-grid-category').text($(this).data('location'));
        $('.event-grid-description').text($(this).data('description'));

        $modal.modal('show');


    })

</script>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/events.blade.php ENDPATH**/ ?>