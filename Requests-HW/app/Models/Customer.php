<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $primaryKey = "customerNumber";

    public $timestamps = false;

    protected $fillable = [
        'customerNumber',
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesRepEmployeeNumber',
        'creditLimit'
    ];

    public function attendant(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }
}
