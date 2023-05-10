<?php

namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sizes;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke()
    {
        if (is_array(request()->get('id'))) {
            if (count(request()->get('id')) > 0) {
                $sizes = [];
                foreach (request()->get('id') as $size) {
                    $sizes[] = Sizes::find($size);
                }
            }
        } else {
            $sizes = Sizes::where('id',request()->get('id'))->get();
        }
        // продукт для хлебных крошек
        $product = null;
        foreach($sizes as $size){
            $product = $size->product;
            if($product != null){
                break;
            }
        }
        return view('admin.product.size.edit',compact('sizes','product'));
    }
}
