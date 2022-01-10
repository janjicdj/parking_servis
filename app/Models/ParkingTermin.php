<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingTermin extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function parking(){
        return $this->belongsTo(Parking::class);
    }

    public function automobil(){
        return $this->belongsTo(Automobil::class);
    }


}
