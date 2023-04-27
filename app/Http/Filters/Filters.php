<?php

namespace App\Http\Filters;

class Filters 
{
    public function filter($products)
    {
        if(request('min_price') != null){
            $minPrice = request('min_price');
            $maxPrice = request('max_price');
            $products = $products->whereBetween('price', [$minPrice, $maxPrice]);
        }
    
        if(request()->input('sorting') == "low"){
            $products = $products->orderBy('price');
        }
        
        if(request()->input('sorting') == "high"){
            $products = $products->orderByDesc('price');
        }
    
        if(request('brand') != null){
            $products = $products->whereIn('brand', request()->query('brand', []));
        }
        return $products;
    }
}