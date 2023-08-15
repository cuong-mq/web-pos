<?php

namespace App\Services;

use App\Models\ListOrder;
use Illuminate\Http\Request;

class ListOrderService
{
    public function getListOrder($perPage)
    {
        return ListOrder::paginate($perPage);
    }
}