<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRegistracijaToRegBrInAutomobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('automobil', function (Blueprint $table) {
            $table->renameColumn('registracija','reg_br');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('automobil', function (Blueprint $table) {
            $table->renameColumn('reg_br','registracija');
        });
    }
}
