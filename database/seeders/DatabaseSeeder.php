<?php

namespace Database\Seeders;

use App\Models\Automobil;
use App\Models\Parking;
use App\Models\ParkingTermin;
use App\Models\Zaposleni;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Automobil::truncate();
        Zaposleni::truncate();
        Parking::truncate();
        ParkingTermin::truncate();

        // \App\Models\User::factory(10)->create();
    }
}
