<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Promokode extends Model
{
    use HasFactory;
    protected $table = 'promokode';
    protected $guarded = false;

    public function status()
    {
        switch ($this->attributes['status']) {
            case '1':
                $status = 'Действующий';
                break;
            default:
                $status = 'Не активен';
                break;
        }
        return $status;
    }

    public function products()
    {
        $id_products = $this->where('name',$this->name)->select('id_product')->get();
        $products = [];
        foreach($id_products as $id_product){
            $products[] = Products::find($id_product);
        }
        $products = Arr::flatten($products);
        return $products;
    }

    public function promokodes()
    {
        $promokodes = $this->where('name',$this->name)->get();
        $promokodes = Arr::flatten($promokodes);
        return $promokodes;
    }

    public function promokode($id_product)
    {
        $promokode = $this->where('name',$this->name)->where('id_product',$id_product)->first();
        return $promokode;
    }
}
