<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Teacher::class;
    public function definition()
    {
        return [
            'teacher_name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'address' => $this->faker->name(),
            'gender' =>  $this->faker->randomElement(['male', 'female']),
            'phone' => $this->faker->numberBetween(1,20),
            'image_name' => $this->faker->name()
        ];
    }
}
