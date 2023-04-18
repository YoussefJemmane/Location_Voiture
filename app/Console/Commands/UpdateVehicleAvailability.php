<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ReservationController;

class UpdateVehicleAvailability extends Command
{
    protected $signature = 'update:vehicle-availability';

    protected $description = 'Update vehicle availability';

    public function handle()
    {
        $reservationController = new ReservationController();
        $reservationController->updateVehicleAvailability();
        $this->info('Vehicle availability updated successfully.');
    }
}
