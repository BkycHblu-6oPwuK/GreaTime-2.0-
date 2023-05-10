<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory_2\StoreRequest;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
       $data = $request->validated();
       SubSubCategory::firstOrCreate($data);
       return redirect()->route('admin.subcategory_2.index');
    }
}
