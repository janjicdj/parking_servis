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

        $parking1=Parking::factory()->create();
        $parking2=Parking::factory()->create();

       Zaposleni::factory(2)->create([
            "parking_id"=>$parking1->id,
        ]);

       Zaposleni::factory()->create([
            "parking_id"=>$parking2->id,
        ]);

       Automobil::factory(4)->create();

       ParkingTermin::factory(3)->create();

    }
}
