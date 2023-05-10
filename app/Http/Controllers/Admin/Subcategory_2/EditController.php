<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(SubSubCategory $subcategory_2)
    {
       return view('admin.subcategories_2.edit', compact('subcategory_2'));
    }
}
