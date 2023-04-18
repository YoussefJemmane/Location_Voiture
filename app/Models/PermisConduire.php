<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisConduire extends Model
{
    use HasFactory;
    protected $fillable = [
        // from Permisconduire table
        'numPermis',
        'dateObtention',
        'permisConduire_id'

    ];
    // one permis de conduire have one user
    public function user()
    {
        return $this->belongsTo(User::class, 'permisConduire_id', 'id');
    }
}
