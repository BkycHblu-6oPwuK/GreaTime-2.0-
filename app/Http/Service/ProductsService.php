<?php

namespace App\Http\Service;

use App\Models\Gallary;
use App\Models\Products;
use App\Models\Sizes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductsService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if(isset($data['sizes'])){
                $sizes = $data['sizes'];
                $amounts = $data['amounts'];
                unset($data['sizes'],$data['amounts']);
            }

            $data['image'] = Storage::disk('public')->put('/images/products/'.$data['name'].'',$data['image']);
            $product = Products::firstOrCreate(['name' => $data['name']],$data);
            if (isset($sizes)) {
                for ($i = 0; $i < count($sizes); $i++) {
                    $size = $sizes[$i];
                    $sizeModel = Sizes::where([
                        'id_product' => $product->id,
                        'size' => $size,
                    ])->first();
            
                    if (!$sizeModel) {
                        $sizeModel = Sizes::create([
                            'id_product' => $product->id,
                            'size' => $size,
                            'amount' => $amounts[$i],
                        ]);
                    } else {
                        $sizeModel->amount = $amounts[$i];
                    }
                    $sizeModel->save();
                }
                $product->updateAmount();
            }
            DB::commit();
            return $product;
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data,$product)
    {
        try {
            DB::beginTransaction();
            if(isset($data['image'])){
                Storage::disk('public')->delete($product->image);
                $data['image'] = Storage::disk('public')->put('/images/products/'.$data['name'].'',$data['image']);
            } 
            if($product->name != $data['name']) {
                if(!isset($data['image'])){
                    $image = basename($product->image);
                    Storage::disk('public')->move($product->image, 'images/products/'.$data['name'].'/'.$image.'');  // перемещение главной картинки если новой не было загружено
                    $data['image'] = "images/products/".$data['name']."/".$image."";
                }
                Storage::disk('public')->move(dirname($product->image) . '/gallary', 'images/products/' . $data['name'] . '/gallary'); // перемещение галереи
                $gallarys = $product->gallary;
                foreach($gallarys as $gallary){
                    $directory = dirname($gallary->image,3);
                    $basename = basename($gallary->image);
                    $newDirectory = $directory . '/' . $data['name'] . '/gallary/' . $basename;
                    $gallary->update(['image' => $newDirectory]);
                }
                Storage::disk('public')->deleteDirectory(dirname($product->image));
            }
            $product->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            abort(500);
        }
    }

    public function gallaryStore($data,$product)
    {
        try {
            DB::beginTransaction();
            foreach($data['image'] as $image){
                $img = Storage::disk('public')->put('/images/products/'.$product->name.'/gallary',$image);
                Gallary::create(['id_product' => $product->id,'image' => $img]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

}
