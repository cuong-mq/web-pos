<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{

    public function getProduct()
    {
        return Product::all();
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $product->price = $request->price;
        $product->save();
        return $product;
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function updateProduct(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $product->price = $request->price;
        $product->save();
        return $product;
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }
}
