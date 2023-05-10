<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(SubSubCategory $subcategory_2)
    {
        $subcategory_2->delete();
       return redirect()->route('admin.subcategory_2.index');
    }
}
