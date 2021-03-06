<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobil extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function automobil(){
        return $this->hasMany(ParkingTermin::class);
    }
}
