<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_subcategory';
    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(Products::class,'id_sub_sub_cat','id')->where('amount','!=',0);
    }
    public function Allproducts()
    {
        return $this->hasMany(Products::class,'id_sub_sub_cat','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'id_sub_cat','id');
    }
}
