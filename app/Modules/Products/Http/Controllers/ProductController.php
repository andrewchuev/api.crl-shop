<?php
namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function show($id)
    {
        return response()->json($this->productService->getProductById($id));
    }

    public function filter(Request $request)
    {
        $filters = $request->only(['category', 'price_range']);
        return response()->json($this->productService->filterProducts($filters));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        return response()->json($this->productService->searchProducts($keyword));
    }
}
