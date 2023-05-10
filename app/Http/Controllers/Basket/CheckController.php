<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Busket;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function __invoke()
    {
        if (request()->get('size') != null) {
            $busket = Busket::where('size', request()->get('size'))->where('id_product', request()->get('id_product'))->first();
        } else {
            $busket = Busket::where('id_product', request()->get('id_product'))->first();
        }
        $productSizeAmount = Sizes::where('id_product', request()->get('id_product'))->where('size', request()->get('size'))->select('amount')->first();
        return response()->json([$busket, $productSizeAmount]);
    }
}
