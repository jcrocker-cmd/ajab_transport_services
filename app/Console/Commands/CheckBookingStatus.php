<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;

class CheckBookingStatus extends Command
{
    protected $signature = 'booking:check-status';

    protected $description = 'Check booking status and update car availability.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $bookings = Booking::where('status', '=', 'Confirmed')->get();

        foreach ($bookings as $booking) {
            $now = now();
            $return_date_time = $booking->return_date . ' ' . $booking->return_time;

            if ($now->gte($return_date_time)) {
                $booking->status = 'Closed';
                $booking->save();
                $car = $booking->car;
                $car->status = 'Available';
                $car->save();
            }
        }

        $this->info('Booking status checked and car availability updated.');
    }
}
