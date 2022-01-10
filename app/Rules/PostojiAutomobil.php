<?php

namespace App\Rules;

use App\Models\Automobil;
use Illuminate\Contracts\Validation\Rule;

class PostojiAutomobil implements Rule
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
        $automobil = Automobil::find($value);
        return $automobil!=null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ne postoji automobil.';
    }
}
