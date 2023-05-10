<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Promokode;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $promokodes = Promokode::all()->unique('name');
        return view('admin.promokode.index',compact('promokodes'));
    }
}
