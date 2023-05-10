<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\UpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(SubCategory $subcategory, UpdateRequest $request)
    {
        $data = $request->validated();
        $subcategory->update($data);
       return view('admin.subcategories.show', compact('subcategory'));
    }
}
