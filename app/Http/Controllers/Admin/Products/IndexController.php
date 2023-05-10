<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Category $category,SubCategory $subcategory,SubSubCategory $subcategory_2)
    {
        $products = Products::all();
        $categories = Category::all();
        if(isset($category->id)){
            $products = $category->allProducts;
        }
        if(isset($subcategory->id)){
            $products = $subcategory->allProducts;
        }
        if(isset($subcategory_2->id)){
            $products = $subcategory_2->allProducts;
        }
        return view('admin.product.index',compact('products','categories'));
    }
}
