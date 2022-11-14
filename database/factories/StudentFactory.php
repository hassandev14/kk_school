<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'roll_no' => $this->faker->numberBetween(1,20),
            'father_name' => $this->faker->name(),
            'address' => $this->faker->name(),
            'gender' =>  $this->faker->randomElement(['male', 'female']),
            'phone' => $this->faker->numberBetween(1,20),
            'image_name' => $this->faker->name()
        ];
    }
}
