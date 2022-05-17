<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->string('nom',45) ; 
            $table->string('prenom',45) ; 
            $table->string('telephone',45) ; 
            $table->date("date") ; 
            $table->time("time") ; 
            $table->string('nom_malade',80)->nullable() ; 
            $table->text('description') ;
            $table->string('isFirstTime',10)->default('نعم'); 
            $table->string('status',100)->default('en cours') ; 
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
        Schema::dropIfExists('rendez_vous');
    }
}