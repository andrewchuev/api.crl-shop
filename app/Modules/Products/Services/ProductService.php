<?php
namespace App\Modules\Products\Services;

use App\Modules\Products\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }

    public function filterProducts($filters)
    {
        return $this->productRepository->filterProducts($filters);
    }

    public function searchProducts($keyword)
    {
        return $this->productRepository->searchProducts($keyword);
    }
}
