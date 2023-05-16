<?php


namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\characteristic\StoreRequest;
use App\Models\Characteristic;
use App\Models\Products;
use App\Models\NameCharacteristic;
use App\Models\Sizes;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Products $product,StoreRequest $request)
    {
        $data = $request->validated();
        $chars = $request->input('name_chars');
        $values = $request->input('values');
        foreach($chars as $index => $char){
            $value = $values[$index];
            $charModel = NameCharacteristic::UpdateOrCreate(['name' => $char],['name' => $char]);
            $data = [
                'id_product' => $product->id,
                'id_name_char' => $charModel->id,
                'value' => $value,
            ];
            Characteristic::updateOrCreate(
            [
                'id_product' => $product->id,
                'id_name_char' => $charModel->id,
                'value' => $value,
            ], $data);
        }
        return redirect()->route('admin.product.show',$product->id);
    }
}
