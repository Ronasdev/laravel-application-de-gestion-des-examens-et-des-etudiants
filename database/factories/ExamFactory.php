<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->city(),
            'date' => fake()->dateTime(),
            'course_id' => Course::inRandomOrder()->first(),
        ];
    }
}

// "Analyse Vectorielle",
//                 "Probabilité",
//                 "Programmation Orientéé objet en PHP",
//                 "Algorithme Binaire"
