<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Busket;
use App\Models\Promokode;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $baskets = auth()->user()->basket;
        $products = [];
        $i = 0;
        foreach($baskets as $basket){
            $products[] = $basket->product;
            if($basket->id_promokode != null){
                $percentPromokode = Promokode::find($basket->id_promokode)->percent;
                $percentPromokode = 1 - $percentPromokode;
                $products[$i]['price'] = $products[$i]['price'] * $percentPromokode;
            }
            $i++;
        }
        return view('orders.index',compact('baskets','products'));
    }
}
