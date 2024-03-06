<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $primaryKey = "employeeNumber";

    public $timestamps = false;

    protected $fillable = [
        'employeeNumber',
        'lastName',
        'firstName',
        'extension',
        'email',
        'officeCode',
        'reportsTo',
        'jobTitle'
    ];

    public function servicedCustomers(): HasMany
    {
        return $this->hasMany(Customer::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'officeCode', 'officeCode');
    }
}
