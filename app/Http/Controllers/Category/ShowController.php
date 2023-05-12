<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $subCategories = $category->subCategory;
        $subSubCategory = [];

        foreach($subCategories as $key => $subCategory){
            if($subCategory->products->count() == 0){
                unset($subCategories[$key]);
            }
        }
        $subCategories =  $subCategories->values();

        foreach($subCategories as $subCategory){
            $subSubCategory[] = $subCategory->SubSubCategory;
        }

        $subSubCategory = Arr::flatten($subSubCategory);

        foreach($subSubCategory as $key => $subCategory){
            if($subCategory->products->count() == 0){
                unset($subSubCategory[$key]);
            }
        }
        
        $subSubCategory = array_values($subSubCategory);
        return response()->json([$subCategories,$subSubCategory]);
    }
}
