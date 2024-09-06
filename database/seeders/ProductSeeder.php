<?php

namespace Database\Seeders;

use App\Modules\Products\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = DB::table('categories')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            Product::create([
                'name' => $faker->words(3, true), // Генерация названия из 3 слов
                'description' => $faker->sentence(10), // Генерация описания
                'price' => $faker->randomFloat(2, 10, 500), // Цена от 10 до 500
                'stock' => $faker->numberBetween(0, 100), // Количество на складе
                'category_id' => $faker->randomElement($categories), // Случайная категория
                'image' => $faker->imageUrl(640, 480, 'product', true, 'Faker'), // Генерация случайного изображения
            ]);
        }
    }
}
