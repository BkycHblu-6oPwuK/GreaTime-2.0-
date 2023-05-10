<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Promokode\StoreRequest;
use App\Models\Promokode;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['percent'] = $data['percent'] / 100;
        $products = $data['products'];
        unset($data['products']);
        foreach($products as $product){
            $data['id_product'] = $product;
            Promokode::create($data);
        }
        return redirect()->route('admin.promokode.index');
    }
}
