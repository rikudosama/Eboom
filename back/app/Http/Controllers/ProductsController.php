<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return $product;
    }
}
