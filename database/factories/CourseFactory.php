<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->country(),
            'description' =>fake()->paragraph(3),
        ];
    }
}

// "OMP",
//                 "Physique numérique",
//                 "Physiqye quantique",
//                 "Thermodynamique",
//                 "AVG",
//                 "Programmation Structurelle",
//                 "Programmation orientéé Objet",
//                 "Analyse des données",
//                 "Achitecture logicielle"
