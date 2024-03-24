<?php

namespace App\Rules;

use App\Models\Room;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotBookedRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $room = Room::find($value);
        if(!is_null($room->booking) && $this->method === 'post') $fail('This room is already booked');
    }
}
