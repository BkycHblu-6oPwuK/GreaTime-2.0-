<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }

    public function SubSubCategory()
    {
        return $this->hasMany(SubSubCategory::class,'id_sub_cat','id');
    }

    public function products()
    {
        return $this->hasMany(Products::class,'id_sub_cat','id')->where('amount','!=',0);
    }
    public function Allproducts()
    {
        return $this->hasMany(Products::class,'id_sub_cat','id');
    }
}
