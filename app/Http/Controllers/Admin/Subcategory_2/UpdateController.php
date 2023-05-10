<?php

namespace App\Http\Controllers\Admin\Subcategory_2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory_2\UpdateRequest;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(SubSubCategory $subcategory_2, UpdateRequest $request)
    {
        $data = $request->validated();
        $subcategory_2->update($data);
        return view('admin.subcategories_2.show', compact('subcategory_2'));
    }
}
