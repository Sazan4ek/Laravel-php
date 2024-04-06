<?php

namespace App\Http\Requests;

use App\Rules\NotBookedRule;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerFirstName' => ['required', 'string', 'max:50'],
            'customerLastName' => ['required', 'string', 'max:50'],
            'customerEmail' => (($this->method === 'post') 
            ? ['required', 'email:rfc,dns', 'unique:bookings,customerEmail'] 
            : ['required', 'email:rfc,dns' ]),
            'customerPhone' => ['required', 'string', 'max:50'],
            'booked_until' => ['required', 'date_format:Y-m-d', 'after_or_equal:now'],
            'room_id' => ['required', 'exists:rooms,id', new NotBookedRule($this->method())]
        ];
    }


}
