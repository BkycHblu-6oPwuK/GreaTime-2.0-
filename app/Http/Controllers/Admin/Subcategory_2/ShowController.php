<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(SubSubCategory $subcategory_2)
    {
        $categories = Category::all();
       return view('admin.subcategories_2.show', compact('subcategory_2'));
    }
}
