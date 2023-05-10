<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Catalog;
use Illuminate\Support\Facades\Cache;

class ShowController extends BaseController
{
    public function __invoke(Category $category,SubCategory $subCategory,SubSubCategory $subSubCategory,Request $request)
    {
        if(isset($category->id)){
            $products = $category->products();
            $title = $category->name;
        }

        if(isset($subCategory->id)){
            $products = $category->productsForSubcategory($subCategory->id);
            $title = $subCategory->name;
        }

        if(isset($subSubCategory->id)){
            $products = $category->productsForSubSubcategory($subCategory->id,$subSubCategory->id);
            $title = $subSubCategory->name;
        }
        
        $brands = $products->pluck('brand')->unique();
        $min_price = $products->pluck('price')->min();
        $max_price = $products->pluck('price')->max();
       
        $name_char = $this->products->getNameCharacteristic($products);
        $characteristics = $this->products->getValueChar($products,$name_char);

        $request = $request->collect();
        $additionalParams = ['sorting', 'min_price', 'max_price', 'brand', 'page'];
        if ($request->except($additionalParams)->count() > 0) {
            $products = $this->products->filter($products, $request);
        }
        $products = $this->products->baseFilter($products);
        $countProducts = $this->products->CountProduct($products,$name_char);
        $products = $products->paginate(15);
        return view('catalog.index', compact('products','name_char','brands','min_price','max_price','title','countProducts','characteristics'));
    }
}

