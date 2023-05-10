<?php


namespace App\Http\Controllers\Admin\Products\Sizes;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Sizes;
use Illuminate\Http\Request;

class DeletesController extends BaseController
{
    public function __invoke()
    {
        if (is_array(request()->get('id'))) {
            if (count(request()->get('id')) > 0) {
                foreach (request()->get('id') as $size) {
                   $sizes = Sizes::find($size);
                   $sizes->delete();
                   $product = $sizes->product;
                }
                $product->updateAmount();
                return redirect()->back();
            }
        }
    }
}
