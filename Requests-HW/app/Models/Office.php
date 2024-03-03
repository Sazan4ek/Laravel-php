<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Office extends Model
{
    use HasFactory;

    protected $table = "offices";

    protected $primaryKey = "officeCode";

    public $timestamps = false;

    protected $fillable = [
        'officeCode',
        'city',
        'phone',
        'addressLine1',
        'addressLine2',
        'state',
        'country',
        'postalCode',
        'territory'
    ];

    public function emloyees(): HasMany
    {
        return $this->hasMany(Employee::class, 'officeCode', 'officeCode');
    }
}
