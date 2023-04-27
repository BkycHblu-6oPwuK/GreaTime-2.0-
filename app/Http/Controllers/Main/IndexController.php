<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Products::all()->where('amount','!=',0)->take(12);
        return view('main.index',compact('products'));
    }
}
