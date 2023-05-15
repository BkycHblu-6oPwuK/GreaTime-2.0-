<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Busket\BusketRequest;
use App\Models\Busket;
use App\Models\Products;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Products $product)
    {
        if(auth()->user() != null){
            $data = [
                'id_user' => auth()->user()->id,
                'id_product' => $product->id,
            ];

            if(request()->get('size')){
                $data['size'] = request()->get('size');
            }

            if(request()->get('amount') > 1){
                if(request()->get('size')){
                    $prod_size = $product->sizes()->where('size',request()->get('size'))->first();
                    if($prod_size == null){
                        $message = ['amount' => 'Товара больше нет в наличии'];
                        return response()->json($message);
                    } else {
                        if($prod_size->amount >= request()->get('amount')){
                            $data['amount'] = request()->get('amount');
                        } else {
                            $message = ['amount' => 'В наличии только '.$prod_size->amount.''];
                            return response()->json($message);
                        }
                    }
                } else {
                    if($product->amount == null){
                        $message = ['amount' => 'Товара больше нет в наличии'];
                        return response()->json($message);
                    } else {
                        if($product->amount >= request()->get('amount')){
                            $data['amount'] = request()->get('amount');
                        } else {
                            $message = ['amount' => 'В наличии только '.$product->amount.''];
                            return response()->json($message);
                        }
                    }
                }
            }

            $busket = Busket::firstOrCreate($data);
            $message = ['success' => 'Успех','busket' => $busket];
            
        } else {
            $message = ['url' => route('login')];
        }
        return response()->json($message);
    }
}
