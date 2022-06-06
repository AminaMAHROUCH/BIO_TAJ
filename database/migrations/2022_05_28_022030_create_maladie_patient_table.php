<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Maladie;
use App\Models\Patient;

class CreateMaladiePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maladie_patient', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('maladie_patient');
    }
}
