<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $table= 'visite';
    // public function produit(){
    //     return $this->belongsTo(Produit::class, 'produit_id');
    // }
}