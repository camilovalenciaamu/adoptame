<?php

namespace Database\Factories;

use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstitutionFactory extends Factory
{

    protected $model = Institution::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->randomElement([3163991520, 3163991521, 3163991522, 3163991523, 3163991524]),
            'email' => $this->faker->randomElement(['test@test.com', 'test1@test.com', 'test2@test.com', 'test3@test.com', 'test4@test.com']),
        ];
    }
}