<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function models()
    {
        return $this->belongsTo(Models::class, 'modele_id', 'id');
    }
    public function marques()
    {
        return $this->belongsTo(Marque::class, 'marque_id', 'id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'vehicule_id', 'id');
    }
}
