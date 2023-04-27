<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Products $product)
    {
        $products = Products::all()->where('amount','!=',0)->take(12);
        return view('catalog.show', compact('products','product'));
    }
}
