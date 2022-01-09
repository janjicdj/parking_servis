<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parking extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function termini(){
       $this->hasMany(ParkingTermin::class);
    }

    public function zaposleni(){
        $this->hasMany(Zaposleni::class);
    }

}
