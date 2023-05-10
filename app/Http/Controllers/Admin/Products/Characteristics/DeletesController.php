<?php


namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Characteristic;
use Illuminate\Http\Request;

class DeletesController extends BaseController
{
    public function __invoke()
    {
        if (is_array(request()->get('id'))) {
            if (count(request()->get('id')) > 0) {
                foreach (request()->get('id') as $char) {
                   $chars = Characteristic::find($char);
                   $chars->delete();
                }
                return redirect()->back();
            }
        }
    }
}
