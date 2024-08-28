<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    protected static $subCategories = [
        'Sofa' => ['L-Shaped', 'Sectional', 'Loveseat', 'Chesterfield', 'Tuxedo'],
        'Bed' => ['Platform', 'Canopy', 'Sleigh', 'Bunk', 'Murphy'],
        'Almirah' => ['Sliding Door', 'Hinged Door', 'Walk-in', 'Corner', 'Freestanding'],
        'Table' => ['Dining', 'Coffee', 'End', 'Console', 'Folding'],
        'Chair' => ['Dining', 'Accent', 'Armchair', 'Wingback', 'Parsons'],
        'Desk' => ['Writing', 'Computer', 'Executive', 'Standing', 'Secretary'],
        'Recliner' => ['Push-Back', 'Rocker', 'Wall-Hugger', 'Lift', 'Massage'],
        'Stool' => ['Bar', 'Counter', 'Backless', 'Saddle', 'Adjustable'],
    ];

    protected static $categoryIndex = 0;
    protected static $subCategoryIndex = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = array_keys(self::$subCategories);
        $categoryName = $categories[self::$categoryIndex % count($categories)];
        $category = Category::where('name', $categoryName)->first();

        $subCategories = self::$subCategories[$categoryName];
        $subCategoryName = $subCategories[self::$subCategoryIndex % count($subCategories)];

        self::$subCategoryIndex++;
        if (self::$subCategoryIndex >= count($subCategories)) {
            self::$subCategoryIndex = 0;
            self::$categoryIndex++;
        }

        return [
            'name' => $subCategoryName,
            'slug' => Str::slug($subCategoryName),
            'image' => $this->faker->imageUrl(),
            'category_id' => $category->id,
            'description' => $this->faker->sentence(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function () {
            if (self::$categoryIndex >= count(self::$subCategories)) {
                self::$categoryIndex = 0;
                self::$subCategoryIndex = 0;
            }
        });
    }

    public function forCategory(Category $category)
    {
        return $this->state(function (array $attributes) use ($category) {
            $subCategories = self::$subCategories[$category->name];
            $subCategoryName = $subCategories[self::$subCategoryIndex % count($subCategories)];
            self::$subCategoryIndex++;

            return [
                'name' => $subCategoryName,
                'slug' => Str::slug($subCategoryName),
                'category_id' => $category->id,
                'status' => 1,
            ];
        });
    }
}
