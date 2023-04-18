<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;
    public function models()
    {
        return $this->hasMany(Models::class, 'modele_id', 'id');
    }
}
