<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('situation_familiale');
            $table->string('email');
            $table->string('profession');
            $table->string('telephone');
            $table->string('tel_fixe');
            $table->string('adresse');
            $table->string('cni');
            $table->string('id_ville');
            $table->string('nom_passion');
            $table->string('nom_passion');
            $table->string('nom_passion');
            $table->string('nom_passion');
            $table->string('nom_passion');
            $table->string('nom_passion');
            $table->string('nom_passion');

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
        Schema::dropIfExists('patients');
    }
}
