<?php

namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke()
    {
        if (is_array(request()->get('id'))) {
            if (count(request()->get('id')) > 0) {
                $chars = [];
                foreach (request()->get('id') as $key => $char) {
                    $modelChar = Characteristic::find($char);
                    $chars[$key] = $modelChar;
                }
            }
        } else {
            $chars = Characteristic::where('id', request()->get('id'))->get();
        }
        // продукт для хлебных крошек
        $product = null;
        foreach ($chars as $char) {
            $product = $char->product;
            if ($product != null) {
                break;
            }
        }
        return view('admin.product.characteristic.edit', compact('chars','product'));
    }
}
