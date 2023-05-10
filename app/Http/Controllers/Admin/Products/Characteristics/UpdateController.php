<?php

namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Characteristic;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $name_chars = $request->input('name_chars');
        $values = $request->input('values');
        $ids = $request->input('ids');
        foreach ($name_chars as $index => $char) {
            $charModel = Characteristic::find($ids[$index]);
            $name_charModel = $charModel->nameChar;
            $name_charModel->update(['name' => $char]);
            $charModel->update([
                'value' => $values[$index],
            ]);
        }
        $product = $charModel->id_product;
        return redirect()->route('admin.product.show',$product);
    }
}
