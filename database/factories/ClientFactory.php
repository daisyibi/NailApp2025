<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = \App\Models\Client::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'design_choice' => $this->faker->randomElement(['French Tips', 'Ombre', 'Marble', 'Gel']),
            'nail_tech_name' => $this->faker->firstName(),
            'charms' => $this->faker->randomElement(['None', 'Rhinestones', 'Glitter', 'Stickers']),
            'image' => null,
            'notes' => $this->faker->sentence(),
        ];
    }
}
