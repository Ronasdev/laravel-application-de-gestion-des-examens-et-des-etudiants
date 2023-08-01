<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [        
            'firstname' => fake()->firstName(),
            'lastname'  => fake()->lastName(),
            'email'     => fake()->unique()->safeEmail(),
            'mobile'    => fake()->unique()->phoneNumber(),
            "filiere_id"=> Filiere::inRandomOrder()->first()
        ];
    }
}
