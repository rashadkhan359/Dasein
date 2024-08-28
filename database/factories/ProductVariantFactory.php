<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'stock_qty' => $this->faker->numberBetween(1, 100),
            'video_link' => $this->faker->url(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'offer_price' => $this->faker->optional()->randomFloat(2, 5, 1000),
            'offer_start_date' => $this->faker->optional()->dateTimeBetween('-1 month', '+1 month'),
            'offer_end_date' => $this->faker->optional()->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
