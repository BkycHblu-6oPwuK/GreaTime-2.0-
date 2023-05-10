<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategory.index');
    }
}
