<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderService
{
    public function getOrder($perPage)
    {
        return Order::with('products')->paginate($perPage);
    }
    public function getProduct()
    {
        return Product::all();
    }
}
