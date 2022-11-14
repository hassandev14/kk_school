<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\My_classes;

class My_classesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = My_classes::class;
    public function definition()
    {
        return [
            'class_name' => $this->faker->name()
        ];
    }
}
