<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity');;
    }
}
