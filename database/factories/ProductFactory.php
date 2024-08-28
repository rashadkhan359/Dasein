<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'image' => $this->faker->imageUrl(),
            'store_id' => Store::inRandomOrder()->first()->id ?? Store::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'sub_category_id' => Subcategory::inRandomOrder()->first()->id ?? Subcategory::factory(),
            'short_description' => $this->faker->sentence(),
            'long_description' => $this->faker->paragraph(),
            'product_type' => $this->faker->randomElement([0, 1, 2]),
            'manufacturer' => $this->faker->company(),
            'status' => $this->faker->randomElement([0, 1]),
            'is_approved' => $this->faker->boolean(),
            'visibility' => $this->faker->randomElement([0, 1]),
            'allow_backorder' => $this->faker->boolean(),
            'publish_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence(),
        ];
    }
}
