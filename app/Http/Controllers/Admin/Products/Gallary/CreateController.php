<?php

namespace App\Http\Controllers\Admin\Products\Gallary;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Models\Products;

class CreateController extends  BaseController
{
    public function __invoke(Products $product)
    {
        return view('admin.product.gallary.create',compact('product'));
    }
}
