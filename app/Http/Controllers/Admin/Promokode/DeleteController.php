<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Promokode;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Promokode $promokode,Products $product)
    {
        $promokode = $promokode->promokode($product->id);
        $name = $promokode->name;
        $promokode->delete();
        $promokode = Promokode::where('name',$name)->first();
        if($promokode != null){
            return redirect()->route('admin.promokode.show',$promokode->id);
        }
        return redirect()->route('admin.promokode.index');
    }
}
