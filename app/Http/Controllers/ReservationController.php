<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Vehicule;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\User;
use DateTime;

class ReservationController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index($vehiculeId)
    {
        $vehicule = Vehicule::find($vehiculeId);

        $reservation = Reservation::where('vehicule_id', $vehiculeId)->latest()->get();

        return view('reserver.index',compact('vehicule','reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vehiculeId)
    {
        $vehicule = Vehicule::find($vehiculeId);
        return view('reserver.create',compact('vehicule'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$vehiculeId)
    {
        $vehicule = Vehicule::find($vehiculeId);
        $latestReservation = Reservation::latest()->first();
    $numReservation = $latestReservation ? $latestReservation->numReservation + 1 : 1;

        $reservation = new Reservation();
        $reservation->client_id = auth()->user()->id;
        $reservation->vehicule_id = $vehiculeId;
        $reservation->dateDebut = $request->dateDebut;
        $reservation->dateFin = $request->dateFin;
        $reservation->numReservation = $numReservation;
        $date1 = new DateTime($reservation->dateDebut);
        $date2 = new DateTime($reservation->dateFin);
        $interval = $date1->diff($date2);
        // disponibilite de vehicule

        $reservation->prixTTC = $vehicule->prixJour * $interval->format('%d');
        $reservation->status = "pending";
        $reservation->save();
        return redirect()->route('vehicules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
    public function indexall()
    {
        $vehicule = Vehicule::all();
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return view('reservation.index',compact('reservations','vehicule'));
    }
    public function indexparUser($userId)
{
    $reservations = Reservation::where('client_id', $userId)->get();
    return view('reservation.indexuser', compact('reservations'));
}

    public function confirm($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        $reservation->status = "complete";
        // when the reservation is complete the diponibilite of vehicule is 0
        $vehicule = Vehicule::find($reservation->vehicule_id);
        $vehicule->disponible = 0;
        $vehicule->update();
        $reservation->update();
        return redirect('reserveation');
    }
    // no confirm
    public function noconfirm($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        $reservation->status = "no complete";
        // send a msg to client
        $reservation->update();
        return redirect('reserveation');
    }
}
