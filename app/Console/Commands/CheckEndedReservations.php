<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Illuminate\Console\Command;

class CheckEndedReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-ended-reservations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $reservations = Reservation::where('dateFin', '<=', now())->get();

    foreach ($reservations as $reservation) {
        $vehicule = $reservation->vehicule;
        $vehicule->update(['disponible' => true]);
    }
}

}
