<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Room::factory(30)->state(function(array $attributes){
            if(rand() % 2)
            {
                return ['type' => 'luxury'];
            }
            else return ['type' => 'economy'];
        })->create();
        Booking::factory(20)->state(new Sequence(
            fn (Sequence $sequence) => ['room_id' => Room::whereDoesntHave('booking')->get()->random()],
        ))->create();
    }
}
