<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'id_sub_cat','id');
    }
    public function subSubcategory()
    {
        return $this->belongsTo(SubSubCategory::class,'id_sub_sub_cat','id');
    }

    public function review()
    {
        return $this->hasMany(Reviews::class,'id_prod','id')->where('status',1);
    }
    public function reviewAvg($id_prod)
    {
        return Reviews::query()->where('id_prod',$id_prod)->where('status',1)->avg('estimation');
    }

    public function sizes()
    {
        return $this->hasMany(Sizes::class,'id_product','id')->orderBy('size')->where('amount','!=',0);
    }
    public function sizesAll()
    {
        return $this->hasMany(Sizes::class,'id_product','id');
    }

    public function characteristic()
    {
        return $this->hasMany(Characteristic::class,'id_product','id');
    }

    public function nameChar()
    {
        return $this->belongsToMany(NameCharacteristic::class,'characteristic','id_product','id_name_char');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'reviews','id_prod','id_user')->select('users.id','users.name','users.surname')->distinct();
    }

    public function updateAmount()
    {
        $sizes = $this->sizesAll;
        $amount = 0;
        foreach($sizes as $size){
            $amount = $amount + $size->amount;
        }
        $this->update(['amount' => $amount]);
    }

    public function gallary()
    {
        return $this->hasMany(Gallary::class,'id_product','id');
    }
}
