<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Busket extends Model
{
    use HasFactory;
    protected $table = 'busket';
    protected $guarded = false;

    public function product()
    {
        return $this->belongsTo(Products::class,'id_product','id');
    }

    public function getAmountInproductSizes()
    {
        $amount = $this->hasMany(Sizes::class,'id_product','id_product')->select('amount')->where('size',$this->size);
        return $amount;
    }
}
