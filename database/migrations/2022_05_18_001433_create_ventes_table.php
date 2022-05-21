<?php

use App\Models\Client;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite_v') ; 
            $table->double("prix_total") ; 
            $table->double("avance") ; 
            $table->double("reste") ; 
            $table->timestamp('date_vente')->useCurrent(); 
            $table->integer("patient_id")->nullable() ; 
            $table->integer("client_id")->nullable() ;
            $table->integer("nvclient_id")->nullable() ;
            $table->foreignIdFor(Produit::class)->constrained() ;  // un patient est un clien
            // $table->foreignIdFor(Client::class)->constrained() ; 
            //$table->foreignIdFor(Patient::class)->constrained() ; 
            //$table->foreignIdFor(User::class)->constrained() ; à décommenter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventes');
    }
}