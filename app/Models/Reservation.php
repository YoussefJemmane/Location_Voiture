<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    // a vehicle can have many reservations
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id', 'id');
    }
    // a user can have many reservations
    public function users()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

}
