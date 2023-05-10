<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Products $product)
    {
       return view('admin.product.show',compact('product'));
    }
}
