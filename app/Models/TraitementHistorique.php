<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitementHistorique extends Model
{
    use HasFactory;

    public function traitement(){
        return $this->belongsTo(Traitement::class, 'traitement_id');
    }
}
