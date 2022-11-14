<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employe;

class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employe_name' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'salary' => $this->faker->name(),
            'father_name' => $this->faker->name(),
            'address' => $this->faker->name(),
            'pay_date' => $this->faker->dateTimeAD(),
            'phone' => $this->faker->numberBetween(1,20),
            'image_name' => $this->faker->name()
        ];
    }
}
