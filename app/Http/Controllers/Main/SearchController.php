<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __invoke()
    {
        $products = DB::table('products')->where('name', 'like', '%'.request()->get('search').'%')->get();
        $category = DB::table('category')->where('name', 'like', '%'.request()->get('search').'%')->get();
        $subcategory = DB::table('subcategory')->where('name', 'like', '%'.request()->get('search').'%')->get();
        $sub_subcategory = DB::table('sub_subcategory')->where('name', 'like', '%'.request()->get('search').'%')->get();
        return response()->json([
            'products' => $products,
            'category' => $category,
            'subcategory' => $subcategory,
            'sub_subcategory' => $sub_subcategory,
        ]);
    }
}
