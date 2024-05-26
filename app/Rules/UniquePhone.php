<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniquePhone implements Rule
{
    protected $phoneCode;
    protected $phoneNumber;

    public function __construct($phoneCode, $phoneNumber)
    {
        $this->phoneCode = $phoneCode;
        $this->phoneNumber = $phoneNumber;
    }

    public function passes($attribute, $value)
    {
        // Check if the concatenated phone code and phone number are unique in the clients table
        $exists = DB::table('clients')
            ->where(DB::raw("CONCAT(phone_code, phone)"), $this->phoneCode . $this->phoneNumber)
            ->exists();

        return !$exists;
    }

    public function message()
    {
        
        return 'The phone number has already been taken.';
    }
}
