<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('basket.index');
    }
}
