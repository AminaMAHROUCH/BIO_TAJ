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
    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
