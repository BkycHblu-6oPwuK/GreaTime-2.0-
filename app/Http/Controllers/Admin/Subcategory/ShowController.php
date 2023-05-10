<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(SubCategory $subcategory)
    {
       return view('admin.subcategories.show', compact('subcategory'));
    }
}
