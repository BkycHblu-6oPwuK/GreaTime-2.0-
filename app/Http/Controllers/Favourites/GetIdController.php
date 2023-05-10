<?php

namespace App\Http\Controllers\Favourites;

use App\Http\Controllers\Controller;
use App\Models\Favourites;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GetIdController extends BaseController
{
    public function __invoke()
    {
        if(auth()->user() != null){
            $favourites = auth()->user()->favourites;
            $id_prod = [];
            foreach($favourites as $fav){
                $id_prod[] = ['id' => $fav->id_product];
            }
            return response()->json($id_prod);
        }
    }
}
