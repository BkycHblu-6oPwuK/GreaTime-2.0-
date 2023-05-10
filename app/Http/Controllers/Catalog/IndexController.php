<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Base\Catalog;
use App\Http\Controllers\Catalog\Base;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $products = Products::query();
        if(count(request()->query()) > 1){
            $products = $this->products->baseFilter($products);
        }
        $products = $products->paginate(6);
        $all_prod = Products::all();
        $brands = $all_prod->pluck('brand')->unique();
        $min_price = $all_prod->pluck('price')->min();
        $max_price = $all_prod->pluck('price')->max();
        $title = 'Все товары';
        return view('catalog.index', compact('products','brands','min_price','max_price','title'));
    }
}
