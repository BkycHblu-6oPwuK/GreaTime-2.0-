<?php

namespace App\Http\Controllers\Admin\Products\Gallary;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Requests\Admin\Products\gallary\StoreRequest;
use App\Models\Products;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request,Products $product)
    {
        $data = $request->validated();
        $images = $this->service->gallaryStore($data,$product);
        return redirect()->route('admin.gallary.index',$product->id);
    }
}
