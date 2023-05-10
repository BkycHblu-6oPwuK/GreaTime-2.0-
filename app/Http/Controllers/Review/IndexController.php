<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Products $product)
    {
        $reviews = $product->review()->get();
        foreach($reviews as $key => $rev){
            $reviews[$key]['date'] = $rev->getCreatedAtFormatted();
        }
        $user = $product->user;
        return response()->json(['reviews' => $reviews,'users' => $user]);
    }
}
