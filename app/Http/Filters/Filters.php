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
        if (request('min_price') != null) {
            $minPrice = request('min_price');
            $maxPrice = request('max_price');
            $products = $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if (request()->input('sorting') == "low") {
            $products = $products->orderBy('price');
        }

        if (request()->input('sorting') == "high") {
            $products = $products->orderByDesc('price');
        }

        if (request('brand') != null) {
            $products = $products->whereIn('brand', request()->query('brand', []));
        }
        return $products;
    }
    public function getNameCharacteristic($products,$minCountValueChars)
    {
        $products = $products->get();
        $nameChar = [];
        foreach ($products as $product) {
            $nameChar[] = $product->nameChar;
        }
        $nameChar = collect($nameChar);
        $nameChar = $nameChar->flatten()->unique('name')->values();
        foreach ($nameChar as $key => $name) {
            $characteristics = Characteristic::whereIn('id_product', $products->pluck('id')->toArray())->where('id_name_char', $name->id)->get()->unique('value')->values();
            if ($characteristics->count() < $minCountValueChars) {
                unset($nameChar[$key]);
            }
            foreach($characteristics as $characteristic){
                if(is_numeric($characteristic->value)){
                    unset($nameChar[$key]);
                }
            }
        }
        $nameChar = $nameChar->values();
        return $nameChar;
    }

    public function filter($products, $request)
    {
        unset($request['page'],$request['sorting'], $request['min_price'], $request['max_price'], $request['brand'], $request['search']);
        $products = $products->get();
        $nameChar = collect();
        $value = [];

        foreach ($request as $key => $charValues) {
            $nameChar->push(NameCharacteristic::where('name_en', $key)->first());

            if (is_array($charValues)) {
                $value = array_merge($value, $charValues);
            } else {
                $value[] = $charValues;
            }
        }
        $characteristics = Characteristic::whereIn('id_product', $products->pluck('id')->toArray())
            ->whereIn('id_name_char', $nameChar->pluck('id')->toArray())
            ->whereIn('value', $value)
            ->get();

        $filteredProducts = $products->filter(function ($product) use ($nameChar, $value, $characteristics) {
            foreach ($nameChar as $key => $char) {
                $charac = $characteristics->where('id_product', $product->id)
                    ->where('id_name_char', $char->id)
                    ->whereIn('value', (array)$value);

                if ($charac->isEmpty()) {
                    return false;
                }
            }
            return true;
        });
        $filteredProducts = $filteredProducts->unique('id')->values();
        $filteredProducts = Products::whereIn('id', $filteredProducts->pluck('id')->toArray());
        return $filteredProducts;
    }

    public function CountProduct($products, $nameChar)
    {
        $products = $products->get();
        $value = [];
        $brand = [];
        $data = [];
        $characteristic = collect();
        foreach ($products as $product) {
            if (isset($brand[$product->brand])) {
                $brand[$product->brand] = $brand[$product->brand] + Products::where('brand', $product->brand)->where('id', $product->id)->count();
            } else {
                $brand[$product->brand] = Products::where('brand', $product->brand)->where('id', $product->id)->count();
            }
        }
        $data['brand'] = $brand;

        foreach ($products as $product) {
            foreach ($nameChar as $key => $name) {
                $characteristic[] = $name->characteristic()->where('id_product', $product->id)->get();
            }
        }
        $characteristic = $characteristic->flatten();
        foreach ($nameChar as $name) {
            foreach ($characteristic as $char) {
                if ($name->id == $char->id_name_char) {
                    if (isset($data[$name->name_en][$char->value])) {
                        $data[$name->name_en][$char->value] = $data[$name->name_en][$char->value] + Products::where('id', $char->id_product)->count();
                    } else {
                        $data[$name->name_en][$char->value] = Products::where('id', $char->id_product)->count();
                    }
                }
            }
        }
        return $data;
    }

    public function getValueChar($products, $nameChar)
    {
        $products = $products->get();
        $valueUnique = collect();
        foreach ($nameChar as $name) {
            $value = collect();
            foreach ($products as $product) {
                $value[] = Characteristic::where('id_name_char', $name->id)->where('id_product', $product->id)->get();
            }
            $valueUnique[] = $value->flatten()->unique('value')->values();
        }
        $value = $valueUnique->flatten();
        return $value;
    }
}
