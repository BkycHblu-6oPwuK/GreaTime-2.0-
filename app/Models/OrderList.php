<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderList extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_list';
    protected $guarded = false;

    public function products()
    {
        return $this->belongsTo(Products::class,'id_product','id');
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class,'id_order','id');
    }

    public function priceInSalePromokode()
    {
        $productInOrderList = $this->id_promokode;
        if($productInOrderList != null){
            $percent = Promokode::find($productInOrderList)->select('percent')->value('percent');
        } else {
            $percent = null;
        }
        $percent = 1 - $percent;
        $product = Products::find($this->id_product);
        $price = $product->price * $percent;
        return $price;
    }
}
