<?php

namespace App\Rules;

use App\Models\Office;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TokyoEmployee implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $office = Office::find($value);

        if(is_null($office) || $office->city !== "Tokyo")
        {
            $fail("Employee must work in Tokyo" );
        }
    }
}
