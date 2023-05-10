<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GetCategory extends  BaseController
{
    public function __invoke(Category $id_category, SubCategory $id_subcategory)
    {
        if(isset($id_subcategory->id)){
            $sub_subcategory = $id_subcategory->SubSubCategory;
            return response()->json($sub_subcategory);
        }

        if(isset($id_category->id)){
            $subcategory = $id_category->subCategory;
            return response()->json($subcategory);
        }
    }
}
