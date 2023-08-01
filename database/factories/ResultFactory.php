<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => fake()->numberBetween(0,20),
            'student_id' => Student::inRandomOrder()->first(),
            'exam_id' => Exam::inRandomOrder()->first(),
            'grade' => fake()->word()
        ];
    }
}

// 'Passable',
//                 "Assez-bien",
//                 "Nul",
//                 "Faible",
//                 "Insuffisante",
//                 "Tres-bien",
//                 "Excellente"