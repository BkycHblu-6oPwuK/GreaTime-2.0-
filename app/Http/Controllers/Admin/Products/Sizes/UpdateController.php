<?php

namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $sizes = $request->input('sizes');
        $amounts = $request->input('amounts');
        $ids = $request->input('ids');
        foreach ($sizes as $index => $size) {
            $amount = $amounts[$index] ?? 0;
            $id = $ids[$index];
            $data = [
                'id' => $id,
                'size' => $size,
                'amount' => $amount,
            ];
            $sizeModel = Sizes::find($id);
            $sizeModel->update($data);
            $product = Products::find($sizeModel->id_product);
        }
        $product->updateAmount();
        return redirect()->route('admin.product.show',$product->id);
    }
}
