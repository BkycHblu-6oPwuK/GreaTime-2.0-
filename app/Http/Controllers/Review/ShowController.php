<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ShowController extends Controller
{
    public function __invoke(Products $product)
    {
        $review = auth()->user()->reviews->where('id_prod',$product->id)->first();
        return view('review.create',compact('product','review'));
    }
}
