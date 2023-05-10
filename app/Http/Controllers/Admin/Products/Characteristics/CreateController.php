<?php


namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreateController extends BaseController
{
    public function __invoke(Products $product)
    {
        $allProducts = $product->category->allProducts;
        $characteristics = [];
        foreach($allProducts as $isproduct){
            $characteristics[] = $isproduct->characteristic;
        }
        $characteristics = Arr::flatten($characteristics);
        $nameChars = [];
        foreach($characteristics as $char){
            $nameChars[] = $char->nameChar;
        }
        $nameChars = array_unique($nameChars);
        return view('admin.product.characteristic.create',compact('product','nameChars'));
    }
}
