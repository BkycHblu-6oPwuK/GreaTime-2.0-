<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Orders $order)
    {
        if(request()->get('status') == 4){
            foreach ($order->orderList as $order_list) {
                $product = Products::find($order_list->id_product);
                if ($order_list->size != null) {
                    $productSize = Sizes::where('id_product', $order_list->id_product)->where('size', $order_list->size)->first();
                    $productSize->update([
                        'amount' => $productSize->amount + $order_list->amount,
                    ]);
                }
                $product->update([
                    'amount' => $product->amount + $order_list->amount
                ]);
            }
        }
        $order->update(['status'=> request()->get('status')]);
        return response()->json(['success' => 'успех']);
    }
}
