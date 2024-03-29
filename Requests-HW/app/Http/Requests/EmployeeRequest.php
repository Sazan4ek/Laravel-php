<?php

namespace App\Http\Requests;

use App\Rules\TokyoEmployee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employeeNumber' => ['required'],
            'lastName' => ['required', 'string'],
            'firstName' => ['required', 'string'],
            'extension' => ['required'],
            'email' => ['required', 'email'],
            'officeCode' => ['required', "exists:offices,officeCode", new TokyoEmployee ],
            'reportsTo' => ['nullable', 'integer'],
            'jobTitle' => ['required', 'string']
        ];
    }
}
