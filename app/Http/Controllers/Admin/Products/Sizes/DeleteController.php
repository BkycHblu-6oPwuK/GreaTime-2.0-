<?php

namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Sizes;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Sizes $size)
    {
        $size->delete();
        $size->product->updateAmount();
        return redirect()->route('admin.product.show',$size->product->id);
    }
}
