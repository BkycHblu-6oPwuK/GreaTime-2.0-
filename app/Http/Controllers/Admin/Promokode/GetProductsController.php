<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Category;

class GetProductsController extends BaseController
{
    public function __invoke(Category $category)
    {
        $products = $category->allProducts()->select('id','name')->get();
        return response()->json($products);
    }
}
