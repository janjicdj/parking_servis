<?php

namespace Database\Seeders;

use App\Models\Automobil;
use App\Models\Parking;
use App\Models\ParkingTermin;
use App\Models\Korisnik;
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
        Korisnik::truncate();
        Parking::truncate();
        ParkingTermin::truncate();

        $parking1=Parking::factory()->create();
        $parking2=Parking::factory()->create();

       Korisnik::factory(2)->create([
            "parking_id"=>$parking1->id,
        ]);

       Korisnik::factory()->create([
            "parking_id"=>$parking2->id,
        ]);

       // Korisnik::factory()->create();

   //    Automobil::factory()->create();

       ParkingTermin::factory(3)->create();

    }
}
