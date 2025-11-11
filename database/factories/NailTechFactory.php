<?php

namespace Database\Factories;

use App\Models\NailTech;
use Illuminate\Database\Eloquent\Factories\Factory;

class NailTechFactory extends Factory
{
    protected $model = NailTech::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'speciality' => $this->faker->randomElement(['Gel Nails', 'French Tips', 'Acrylics']),
            'hourly_rate' => $this->faker->numberBetween(30, 100),
        ];
    }
}
