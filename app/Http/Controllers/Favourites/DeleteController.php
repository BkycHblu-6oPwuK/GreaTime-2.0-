<?php

namespace App\Http\Controllers\Favourites;

use App\Http\Controllers\Controller;
use App\Models\Favourites;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DeleteController extends BaseController
{
    public function __invoke(Products $id)
    {
        if(auth()->user() != null){
            $favourites = Favourites::where('id_user',auth()->user()->id)->where('id_product',$id->id)->first();
            $favourites->delete();
        }
    }
}
