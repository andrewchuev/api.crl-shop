<?php
namespace App\Modules\Products\database\factories;

use App\Modules\Products\Models\Category;
use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => Category::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'product'),
        ];
    }
}
