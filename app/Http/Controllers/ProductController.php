<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getProduct(5);
        return view('product.list', ['products' => $products]);
    }

    public function create()
    {
        return view('product.add');
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->storeProduct($request);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, $id)
    {
        $category = $this->productService->updateProduct($request, $id);
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $category = $this->productService->deleteProduct($id);
        return redirect()->back();
    }
}
