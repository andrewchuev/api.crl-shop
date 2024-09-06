<?php
namespace App\Modules\Products\Repositories;

use App\Modules\Products\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function filterProducts($filters)
    {
        // Пример фильтрации по категории
        $query = Product::query();

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        if (isset($filters['price_range'])) {
            $query->whereBetween('price', $filters['price_range']);
        }

        return $query->get();
    }

    public function searchProducts($keyword)
    {
        return Product::where('name', 'like', "%{$keyword}%")->get();
    }
}
