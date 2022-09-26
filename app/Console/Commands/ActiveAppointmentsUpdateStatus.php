<?php

namespace App\Console\Commands;

use App\Models\ServiceBooking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ActiveAppointmentsUpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointmentupdate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is to update status of active past appointments to complete';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('America/New_York');
        $active_bookings = ServiceBooking::where('status','active')->where('date', '<=',  date('Y-m-d'))->get();
        $nowDate = Carbon::now();
        $ids = '';
        foreach ($active_bookings as $booking) {
            $time = getcompletedTime($booking->time_slot);
            if ($time != 'N/A') {
                $appointment_data_time = ($booking->date && $time && $time != 'N/A') ? Carbon::parse($booking->date . ' ' . $time) : '';
                if ($time && $booking->date && $nowDate->gt($appointment_data_time)) {
                    $booking->status = 'completed';
                    $booking->save();
                    $ids .= $booking->id . ',';
                }
            }
        }
        if($ids) {
            Log::info("Apppointment Status updated: [" . $ids . ']');
        }
    }
}
