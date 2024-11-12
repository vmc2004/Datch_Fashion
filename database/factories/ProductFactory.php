<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name = fake()->text(25);
        return [
            'code' => Str::random(9),
            'name' => $this->faker->text(99),
            'slug' => Str::slug($name) .'-'.  Str::random(8),
            'image' => 'https://photo.znews.vn/w660/Uploaded/mdf_eioxrd/2021_07_06/2.jpg',
            'description' => $this->faker->text(255),
            'material' => $this->faker->text(50),
            'status' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'category_id' => rand(1,3),
            'brand_id' => rand(1,2),
            'created_at' => now(),
            'updated_at' => now(),
           
        ];
    }
}
