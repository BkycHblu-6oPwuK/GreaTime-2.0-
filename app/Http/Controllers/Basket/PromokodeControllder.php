<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Busket\PromokodeRequest;
use App\Models\Busket;
use App\Models\Promokode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PromokodeControllder extends Controller
{
    public function __invoke(PromokodeRequest $request)
    {
        $buskets = auth()->user()->basket;
        $promokode = null;
        foreach ($buskets as $busket) {
            $promokode = Promokode::where('id_product', $busket->id_product)->where('name', $request->name)->where('status',1)->first();
            if($promokode != null){
                if($busket->id_promokode != $promokode->id){
                    $busket->update(['id_promokode' => $promokode->id]);
                    $message['success'] = 'Промокод успешно применен';
                } else {
                    $message['double'] = 'Вы уже применяли данный промокод';
                }
            } else {
                $message['error'] = 'Промокода не существует';
            }
        }
        return response()->json($message);
    }
}
