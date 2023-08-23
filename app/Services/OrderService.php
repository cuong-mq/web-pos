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
    public function storeOrder(Request $request)
    {

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->total_amount = $request->total_price;

        $order->order_date = $request->order_date;
        $order->save();

        foreach ($request->products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }
        return $order;
    }
}
