<?php

namespace App\Http\Service;

use App\Models\Products;
use Illuminate\Support\Arr;

class Service
{
    public function getProductFavourites($id)
    {
        if (is_array($id)) {
            $products = [];
            foreach ($id as $product) {
                $products[] = Products::all()->where('id', $product);
            }
            $products = Arr::flatten($products);
            return $products;
        }
    }
}
