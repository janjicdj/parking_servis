<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTerminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_termin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parking')->constrained('parking')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('automobil')->constrained('automobil')->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('ulazak');
            $table->dateTime('izlazak')->nullable();
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
        Schema::dropIfExists('parking_termin');
    }
}
