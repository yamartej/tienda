<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->sentence(),
            'customer_email' => $this->faker->sentence(),
            'customer_mobile' => $this->faker->sentence(),
            'status' => $this->faker->sentence(),
            'product_name' => $this->faker->sentence(),
            'product_price' => $this->faker->sentence(),
        ];
    }
}
