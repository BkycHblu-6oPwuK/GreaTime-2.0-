<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Promokode;
use App\Models\Reviews;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Products::all()->count();
        $category = Category::all()->count();
        $subcategory = SubCategory::all()->count();
        $subSubcategory = SubSubCategory::all()->count();
        $orders = Orders::all()->count();
        $reviews = Reviews::all()->count();
        $promokodes = Promokode::all()->count();
        $data = [
            'products' => $products,
            'category' => $category,
            'subcategory' => $subcategory,
            'subSubcategory' => $subSubcategory,
            'orders' => $orders,
            'reviews' => $reviews,
            'promokodes' => $promokodes,
        ];
        return view('admin.main.index',compact('data'));
    }
}
