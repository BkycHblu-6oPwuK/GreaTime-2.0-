<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = false;

    public function orderList()
    {
        return $this->hasMany(OrderList::class, 'id_order', 'id');
    }

    public function getCreatedAtFormatted()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d.m.Y');
    }

    public function productsInOrders()
    {
        return $this->belongsToMany(Products::class,'order_list','id_order','id_product');
    }

    public function statusMyOrder()
    {
        switch ($this->attributes['status']) {
            case '1':
                $status = 'В пути';
                break;
            case '2':
                $status = 'Готов к получению';
                break;
            case '3':
                $status = 'Завершен';
                break;
            case '4':
                $status = 'Отменен';
                break;
            default:
                $status = 'В сборке';
                break;
        }
        return $status;
    }

    public function statusPayment()
    {
        switch ($this->attributes['status_payment']) {
            case 1:
                $status = 'Оплачен';
                break;
            default:
                $status = 'Не оплачен';
                break;
        }
        return $status;
    }
}
