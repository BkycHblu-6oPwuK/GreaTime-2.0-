<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = false;

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'id_sub_cat','id');
    }

    public function review()
    {
        return $this->hasMany(Reviews::class,'id_prod','id');
    }

    public function reviewAvg($id_prod)
    {
        return Reviews::query()->where('id_prod',$id_prod)->avg('estimation');
    }

    public function sizes()
    {
        return $this->hasMany(Sizes::class,'id_product','id')->orderBy('size')->where('amount','!=',0);
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

}
