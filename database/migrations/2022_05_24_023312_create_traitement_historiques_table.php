<?php

use App\Models\Patient;
use App\Models\Traitement;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitement_historiques', function (Blueprint $table) {
            $table->id();
            $table->double('prix') ; 
            $table->boolean('isEffected')->default('0') ;
            $table->foreignIdFor(Traitement::class)->constrained() ;
            $table->foreignIdFor(User::class)->constrained() ;
            $table->foreignIdFor(Patient::class)->constrained() ;
            $table->foreignIdFor(Maladie::class)->constrained() ;
            
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
        Schema::dropIfExists('traitement_historiques');
    }
}