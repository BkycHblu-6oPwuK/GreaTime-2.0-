<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreateController extends  BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.promokode.create',compact('categories'));
    }
}
