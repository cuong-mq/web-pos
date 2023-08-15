<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListOrder extends Model
{
    use HasFactory;
    protected $table = 'list_order';
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
