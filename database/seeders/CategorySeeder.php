<?php

namespace Database\Seeders;

use App\Modules\Products\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices and gadgets'],
            ['name' => 'Furniture', 'description' => 'Home and office furniture'],
            ['name' => 'Clothing', 'description' => 'Men and women apparel'],
            ['name' => 'Books', 'description' => 'Printed and electronic books'],
            ['name' => 'Toys', 'description' => 'Toys for children of all ages'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
