
<?php $__env->startSection('title','Calendar'); ?>
<?php $__env->startSection('heading','Calendar'); ?>

<?php $__env->startSection('css'); ?>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.css' rel="stylesheet" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <style>
        .fc-daygrid-event
        {
            max-height: 60px !important;
            border: 1px solid #ccc !important;
        }
       #calendar
        {
                /*background-color: #fff !important;*/
                /*color: #ffff !important;*/
        }
        .fc-toolbar-title{
            color: white;
        }
        .fc-day-today
        {
            /*background-color: #323740 !important;*/
        }
        .fc-button
        {
            background-color: #323740 !important; 
            border: #323740 !important; 
        }
        .fc-button-active
        {
            background-color: black !important; 
            border: black !important; 
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>







    <div class="card mt-1">

        <div class="card-content">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  



<script>
     var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                       themeSystem: 'solar',

                      initialView: ['dayGridMonth'],
                                headerToolbar: {
                                         left: 'prev,next',
                                         center: 'title',
                                          right: 'timeGridWeek,dayGridMonth,dayGridWeek'
                                        },
                                        views: {
                                                timeGridWeek: {
                                                    duration: {days: 1},
                                                    buttonText: '',
                                                }
                                            },
                                        height: 800,
                                        contentHeight: 750,
                                        aspectRatio: 3,

                                         defaultView: '',

                                        editable: true,
                                        eventLimit: true,
                                        displayEventTime:false,
                                        navLinks: true,
                                        events : [

                                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                {
                                                    title : '<?php echo e($item->HomeopathService->title ?? ''); ?>',
                                                    start : '<?php echo e($item->date); ?>T<?php echo e(getBookingTime($item->time_slot)); ?>',
                                                    className: "event-status",

                                                    extendedProps: {
                                                        id:'<?php echo e($item->id); ?>',
                                                        duration:'<?php echo e($item->time); ?>',
                                                        time:'<?php echo e($item->date); ?> | <?php echo e(getBookingTime($item->time_slot)); ?>',
                                                    }



                                                },
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        ],
                                        eventDidMount: function(info)
                                            {
                                                info.el.querySelector('.fc-event-title').innerHTML =
                                                    '<div class="row data-row" data-type="event" data-id="'+info.event.extendedProps.id+'">' +
                                                    '<div class="col-12">' +
                                                    '<span class="float-left text-dark font-weight-bold pt-1" style="font-size: 16px">'+info.event.extendedProps.duration+'' +
                                                    '</span><h6 class="mr-1 mt-1 float-right   badge-success p-1 text-white">'+info.event.extendedProps.time+'</h6></div></div>'+
                                                    '<span class="font-weight-bold text-white">'+ info.event.title+'</span></br>';
                                            },

                    });
                    calendar.render();
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/appointments/calendar.blade.php ENDPATH**/ ?>