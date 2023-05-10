<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $guarded = false;

    public function getCreatedAtFormatted()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d.m.Y');
    }
    public function products()
    {
        return $this->belongsTo(Products::class,'id_prod','id');
    }

    public function status()
    {
        switch ($this->attributes['status']) {
            case '1':
                $status = 'Одобрен';
                break;
            case '2':
                $status = 'Заблокирован';
                break;
            default:
                $status = 'На рассмотрении';
                break;
        }
        return $status;
    }
}
