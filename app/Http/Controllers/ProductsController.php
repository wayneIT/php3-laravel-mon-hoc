<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productsGet = Product::select('*')
            ->orderby('id', 'desc')
            ->paginate(10);
        return view('product.index', ['products' => $productsGet]);
    }


    public function delete(Product $Pro)

    {
        if ($pro->delete()) {
            return redirect()->route('product.index');
        }
        $productDelete = Product::Destroy($id);
        if ($productDelete !== 0) {
            return redirect()->route('products.index');
        }
    }
}
