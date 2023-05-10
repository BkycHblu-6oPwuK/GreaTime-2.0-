<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Products $product)
    {
        $data = $request->validated();
        $this->service->update($data,$product);
        return redirect()->route('admin.product.show',$product->id);
    }
}
