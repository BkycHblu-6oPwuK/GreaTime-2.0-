<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.subcategories_2.create',compact('categories'));
    }
}
