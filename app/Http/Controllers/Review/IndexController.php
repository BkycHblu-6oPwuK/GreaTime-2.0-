<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Products $product)
    {
        $review = $product->review;
        $user = $product->user;
        return response()->json(['reviews' => $review,'users' => $user]);
    }
}
