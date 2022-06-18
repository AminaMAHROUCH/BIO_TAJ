<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function maladie(){
        return $this->belongsTo(Maladie::class, "maladie_id");
    }

}
