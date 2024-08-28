<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected static $itemIndex = 0;
    protected static $items = ['Sofa', 'Bed', 'Almirah', 'Table', 'Chair', 'Desk', 'Recliner', 'Stool']; // Add all your stores here

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $itemName = static::$items[static::$itemIndex % count(static::$items)];

        static::$itemIndex++;

        return [
            'name' => $itemName,
            'slug' => Str::slug($itemName),
            'image' => $this->faker->imageUrl(),
            'description' => fake()->text(),
            'store_id' => Store::where('slug', 'furniture')->first()->id,
            'status' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function () {
            if (static::$itemIndex >= count(static::$items)) {
                static::$itemIndex = 0;
            }
        });
    }
}
