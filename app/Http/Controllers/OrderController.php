<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        // $products = $this->orderService->getProduct();

        $orders = $this->orderService->getOrder(5);
        return view('order.list', ['orders' => $orders]);
    }
}
