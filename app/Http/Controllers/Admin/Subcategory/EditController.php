<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(SubCategory $subcategory)
    {
       return view('admin.subcategories.edit', compact('subcategory'));
    }
}
