<?php

namespace App\Http\Filters;

use App\Models\Characteristic;
use App\Models\NameCharacteristic;
use App\Models\Products;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Filters 
{
    public function baseFilter($products)
    {
        if(request('min_price') != null){
            $minPrice = request('min_price');
            $maxPrice = request('max_price');
            $products = $products->whereBetween('price', [$minPrice, $maxPrice]);
        }
    
        if(request()->input('sorting') == "low"){
            $products = $products->orderBy('price');
        }
        
        if(request()->input('sorting') == "high"){
            $products = $products->orderByDesc('price');
        }
    
        if(request('brand') != null){
            $products = $products->whereIn('brand', request()->query('brand', []));
        }
        return $products;
    }
    public function getNameCharacteristic($products)
    {
        $products = $products->get();
        $nameChar = [];
        foreach($products as $product){
            $nameChar[] = $product->nameChar;
        }
        $nameChar = collect($nameChar);
        $nameChar = $nameChar->flatten()->unique('name')->values();
        foreach($nameChar as $key => $name){
            $count = Characteristic::whereIn('id_product',$products->pluck('id')->toArray())->where('id_name_char',$name->id)->count();
            if($count < 2){
                unset($nameChar[$key]);
            }
        }
        return $nameChar;
    }

    public function filter($products, $request)
    {
        unset($request['sorting'], $request['min_price'], $request['max_price'], $request['brand']);
        $products = $products->get();
        $nameChar = collect();
        $value = [];
        foreach ($request as $key => $char) {
            $nameChar->push(NameCharacteristic::where('name_en', $key)->first());
            $value[] = $request[$key];
        }
    
        $productIds = Products::whereIn('id', $products->pluck('id')->toArray())
        ->whereIn('id', function($query) use ($nameChar, $value) {
            $query->select('id_product')
                ->from('characteristic')
                ->whereIn('id_name_char', $nameChar->pluck('id')->toArray())
                ->where(function($q) use ($nameChar, $value) {
                    foreach ($nameChar as $key => $name) {
                        if ($name !== null) {
                            $q->orWhere(function($query) use ($name, $value, $key) {
                                $query->where('id_name_char', $name->id)
                                    ->where('value', $value[$key]);
                            });
                        }
                    }
                });
        })->pluck('id')->toArray();
        $newProducts = Products::whereIn('id', $productIds);
        
        return $newProducts;
    }

    public function CountProduct($products,$nameChar)
    {
        $products = $products->get();
        $value = [];
        $brand = [];
        $data = [];
        $characteristic = collect();
        foreach($products as $product){
            if(isset($brand[$product->brand])){
                $brand[$product->brand] = $brand[$product->brand] + Products::where('brand',$product->brand)->where('id',$product->id)->count();
            } else {
                $brand[$product->brand] = Products::where('brand',$product->brand)->where('id',$product->id)->count();
            }
        }
        $data['brand'] = $brand;

        foreach($products as $product){
            foreach ($nameChar as $key => $name) {
                $characteristic[] = $name->characteristic()->where('id_product',$product->id)->get();
            }
        }
        $characteristic = $characteristic->flatten();
        foreach($nameChar as $name){
            foreach($characteristic as $char){
                if($name->id == $char->id_name_char){
                    if(isset($data[$name->name_en][$char->value])){
                        $data[$name->name_en][$char->value] = $data[$name->name_en][$char->value] + Products::where('id',$char->id_product)->count();
                    } else {
                        $data[$name->name_en][$char->value] = Products::where('id',$char->id_product)->count();
                    }
                }
            }
        }
        return $data;
    }

    public function getValueChar($products,$nameChar)
    {
        $products = $products->get();
        $value = Characteristic::whereIn('id_name_char',$nameChar->pluck('id')->toArray())->whereIn('id_product',$products->pluck('id')->toArray())->get();
        $value = $value->unique('value')->values();
        return $value;
    }
}