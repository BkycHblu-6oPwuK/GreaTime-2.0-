<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreateController extends  BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $brands = Products::select('brand')->groupBy('brand')->get()->toArray();
        $brands = Arr::flatten($brands);
        return view('admin.product.create',compact('categories','brands'));
    }
}
