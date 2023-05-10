<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(Products::class,'id_category','id')->where('amount','!=',0);
    }
    public function allProducts()
    {
        return $this->hasMany(Products::class,'id_category','id');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class,'id_category','id');
    }
    public function subSubCategory($id_sub_cat)
    {
        return SubSubCategory::where('id_category',$this->id)->where('id_sub_cat',$id_sub_cat)->get();
    }

    public function productsForSubcategory($id_sub_cat)
    {
        return $this->products()->where('amount','!=',0)->where('id_sub_cat', $id_sub_cat);
    }

    public function productsForSubSubcategory($id_sub_cat,$id_sub_sub_cat)
    {
        return $this->products()->where('amount','!=',0)->where('id_sub_cat', $id_sub_cat)->where('id_sub_sub_cat', $id_sub_sub_cat);
    }
}
