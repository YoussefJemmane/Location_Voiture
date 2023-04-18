<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    public function marques()
    {
        return $this->belongsTo(Models::class, 'modele_id', 'id');
    }
}
