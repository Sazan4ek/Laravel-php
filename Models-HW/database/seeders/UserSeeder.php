<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->count(20)
        ->sequence(function (Sequence $sequence){
            if($sequence->index >= 5)
            {
                $flag = rand(0,1);
                if($flag) return ['role' => 'editor'];
                else return ['role' => 'viewer'];
            }
            else return ['role' => 'admin'];
        })
        ->create();
    }
}
