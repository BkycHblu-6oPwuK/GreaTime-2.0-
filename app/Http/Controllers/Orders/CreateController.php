<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Busket\BusketRequest;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Busket;
use App\Models\OrderList;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(OrderRequest $request)
    {
        $data = $request->validated();
        $data['id_user'] = auth()->user()->id;
        $order = Orders::create($data);
        $order = $order->id;
        $baskets = auth()->user()->basket;

        foreach($baskets as $basket){
            
            $order_list = $basket;
            unset($order_list['id'],$order_list['id_user'],$order_list['created_at'],$order_list['updated_at']);
            $order_list['id_order'] = $order;
            OrderList::create($order_list->toArray());

            $product = Products::find($order_list['id_product']);
            if($order_list['size'] != null){
                $productSize = Sizes::where('id_product',$order_list['id_product'])->where('size',$order_list['size'])->first();
                $productSize->update([
                    'amount' => $productSize->amount - $order_list['amount']
                ]);
            }
            $product->update([
                'amount' => $product->amount - $order_list['amount']
            ]);

            $basket->delete();
        }
        
        return redirect()->route('my_orders.index');
    }
}
