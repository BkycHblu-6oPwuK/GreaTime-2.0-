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
            $busket = Busket::firstOrCreate($data);
            $message = ['success' => 'Успех','busket' => $busket];
        } else {
            $message = ['url' => route('login')];
        }
        return response()->json($message);
    }
}
