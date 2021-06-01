<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{

    protected $model = Pet::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'specie' => $this->faker->randomElement(["Perros", "Gatos"]),
            'race' => $this->faker->randomElement(['Airedale Terrier', 'Akita Inu', 'Alaskan Malamute']),
            'date_of_birth' => now(),
            'photo' => $this->faker->randomElement(['link_de_foto']),
            'institution_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}