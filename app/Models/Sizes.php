<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sizes extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'sizes';
    protected $guarded = false;

    public function product()
    {
        return $this->belongsTo(Products::class,"id_product","id");
    }
}
