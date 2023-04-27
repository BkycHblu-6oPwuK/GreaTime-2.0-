<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Busket\BusketRequest;
use App\Models\Busket;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UpdateController extends Controller
{
    public function __invoke(Busket $busket,BusketRequest $request)
    {
        if($request->size == 'null'){

            if($busket->product->amount < $request->amount){
                $message = [
                    'message' => 'Максимальное кол-во',
                    'amount' => $busket->amount
                ];
                return response()->json($message);
            } else {
                $busket->update([
                    'amount' => $request->amount,
                ]);
                return response()->json($busket);
            }
        } else {

            $amount = Arr::get($busket->getAmountInproductSizes,'0.amount');
            
            if($amount < $request->amount){
                $message = [
                    'message' => 'Максимальное кол-во',
                    'amount' => $amount
                ];
                return response()->json($message);
            } else {
                $busket->update([
                    'amount' => $request->amount,
                ]);
                return response()->json($busket);
            }

        }
    }
}
