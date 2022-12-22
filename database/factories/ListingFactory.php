<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(300, 3000),
            'tags' => '3 bedroom, 4 bathrooms, garage',
            'seller' => $this->faker->name(),
            'email' => $this->faker->email(),
            'location' => $this->faker->address(),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
