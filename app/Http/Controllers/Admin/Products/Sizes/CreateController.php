<?php


namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(Products $product)
    {
        return view('admin.product.size.create',compact('product'));
    }
}
