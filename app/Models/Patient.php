<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function ville($id_ville){
        if($id_ville){
            $ville= DB::table("ville")->where("id_ville", $id_ville)->first();
            return $ville->ville;
        }else{
            return " ";
        }
    }
}