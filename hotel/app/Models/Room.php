<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'price',
        'personCapacity',
        'description'
    ];

    public function booking(): HasOne
    {
        return $this->hasOne(Booking::class, 'room_id', 'id');
    }
}
