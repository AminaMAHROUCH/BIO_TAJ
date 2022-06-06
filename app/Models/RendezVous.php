<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class RendezVous extends Model
{
    use HasFactory;
    protected $table="rendez_vous";

    public function patient($id_patient){
        if($id_patient){
            $patient= DB::table("patients")->where("id", $id_patient)->first();
            return $patient;
        }else{
            return " ";
        }
    }
}
