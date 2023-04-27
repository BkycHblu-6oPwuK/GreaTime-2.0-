<?php

namespace App\Http\Controllers\MyOrders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = auth()->user()->orders()->orderByDesc('id')->paginate(5);
        return view('orders.show', compact('orders'));
    }
}
