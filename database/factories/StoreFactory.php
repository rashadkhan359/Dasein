<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected static $itemIndex = 0;
    protected static $items = ['Clothing', 'Furniture', 'Electronics', 'Books']; // Add all your stores here
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
            'image' => fake()->image(),
            'description' => fake()->realText(),
            'status' => $itemName == 'Furniture' ? 1 : 0,
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
