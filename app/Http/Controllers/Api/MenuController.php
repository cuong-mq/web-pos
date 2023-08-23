<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class MenuController extends Controller
{
    protected $productService;
    

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    

    public function index()
    {
        $products = $this->productService->getProduct();
        if (request()->wantsJson()) {
            return response()->json($products, Response::HTTP_OK);
        }
        return view('menu.master')->with('products');
    }

}
