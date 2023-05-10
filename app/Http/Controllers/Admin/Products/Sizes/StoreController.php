<?php


namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Products $product,Request $request)
    {
        $sizes = $request->input('sizes');
        $amounts = $request->input('amounts');
        $all_amount = 0;
        foreach($sizes as $index => $size){
            $amount = $amounts[$index];
            $data = [
                'id_product' => $product->id,
                'size' => $size,
                'amount' => $amount,
            ];
            Sizes::updateOrCreate([
                    'id_product' => $product->id,
                    'size' => $size,
                ],
                $data
            );
        }
        $product->updateAmount();
        return redirect()->route('admin.product.show',$product->id);
    }
}
