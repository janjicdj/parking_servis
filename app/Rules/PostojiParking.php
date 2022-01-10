<?php

namespace App\Rules;

use App\Http\Resources\ParkingResource;
use App\Models\Parking;
use Illuminate\Contracts\Validation\Rule;

class PostojiParking implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $parking = Parking::find($value);
        return $parking!=null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ne postoji parking!';
    }
}
