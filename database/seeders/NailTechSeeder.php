<?php

namespace Database\Seeders;

use App\Models\NailTech;
use Illuminate\Database\Seeder;

class NailTechSeeder extends Seeder
{
    public function run(): void
    {
        NailTech::factory()->count(5)->create();
    }
}
