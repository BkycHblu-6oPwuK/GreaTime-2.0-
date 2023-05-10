<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;
    public $table = 'characteristic';
    public $guarded = false;

    public function nameChar()
    {
        return $this->belongsTo(NameCharacteristic::class,'id_name_char','id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class,'id_product','id');
    }
}
