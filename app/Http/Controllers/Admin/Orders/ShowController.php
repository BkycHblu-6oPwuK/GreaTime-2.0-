<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Orders $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
