<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{
    public function run(): void{
        $currentTimestamp = Carbon::now();
        Client::insert ([

            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'phone_number' => '1234567890',
                'design_choice' => 'French Tips',
                'nail_tech_name' => 'Samantha',
                'charms' => 'Butterfly',
                'image' => 'jane-doe.jpg',
                'notes' => 'Prefers soft pink shades',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Emily Smith',
                'email' => 'emily@example.com',
                'phone_number' => '9876543210',
                'design_choice' => 'Ombre',
                'nail_tech_name' => 'Ashley',
                'charms' => 'Stars',
                'image' => 'emily-smith.jpg',
                'notes' => 'Wants glitter on ring fingers',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Sophia Johnson',
                'email' => 'sophia@example.com',
                'phone_number' => '5551112222',
                'design_choice' => 'Marble',
                'nail_tech_name' => 'Taylor',
                'charms' => 'Diamonds',
                'image' => 'sophia-johnson.jpg',
                'notes' => 'Bring own reference picture',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        
        
    ]);
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    }
}
