<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function store(Request $request)
    {
        $order = $request->all();

        $oder = $this->orderService->storeOrder($request);
        return response()->json($oder, Response::HTTP_CREATED);
    }
}
