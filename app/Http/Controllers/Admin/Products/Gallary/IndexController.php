<?php

namespace App\Http\Controllers\Admin\Products\Gallary;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Models\Products;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Products $product)
    {
        $gallary = $product->gallary;
        return view('admin.product.gallary.index',compact('product','gallary'));
    }
}
