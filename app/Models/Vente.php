<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    public function produit(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }
    public function patient(){
        return $this->belongsTo(Patient::class, 'produit_id');
    }
    public function client(){
        return $this->belongsTo(Client::class, 'produit_id');
    }

}