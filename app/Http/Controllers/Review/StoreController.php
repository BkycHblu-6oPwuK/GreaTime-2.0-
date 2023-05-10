<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class StoreController extends Controller
{
    public function __invoke(Products $product,ReviewRequest $request)
    {
        $data = $request->validated();
        $review = auth()->user()->reviews->where('id_prod',$product->id)->first();
        if(isset($review)){
            if($review->status == 2){
                $data['status'] = 0;
            }
            $review->update($data);
        } else {
            $data['id_user'] = auth()->user()->id;
            $data['id_prod'] = $product->id;
            Reviews::firstOrCreate($data);
        }
        return redirect()->route('my_reviews.index');
    }
}
