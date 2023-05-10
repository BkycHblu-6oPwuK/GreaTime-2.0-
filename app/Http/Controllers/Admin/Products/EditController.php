<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EditController extends BaseController
{
    public function __invoke(Products $product)
    {
        $categories = Category::all();
        $brands = Products::select('brand')->groupBy('brand')->get()->toArray();
        $brands = Arr::flatten($brands);
        return view('admin.product.edit',compact('categories','brands','product'));
    }
}
