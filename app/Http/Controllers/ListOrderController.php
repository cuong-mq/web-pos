<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ListOrderService;

class ListOrderController extends Controller
{
    protected $listOrderService;

    public function __construct(ListOrderService $productService)
    {
        $this->listOrderService = $productService;
    }

    public function index()
    {
        $listOrders = $this->listOrderService->getListOrder(5);
        return view('listorder.list', ['listOrders' => $listOrders]);
    }
}
