<?php

namespace App\Http\Controllers\Admin\Products\Characteristics;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Characteristic;
use App\Models\Sizes;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Characteristic $char)
    {
        $char->delete();
        return redirect()->back();
    }
}
