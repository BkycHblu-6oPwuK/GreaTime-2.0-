<?php

namespace App\Http\Controllers\Favourites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ShowController extends BaseController
{
    public function __invoke()
    {
        $id = request()->get('array');
        if (is_array($id)) {
            $id = Arr::flatten($id);
            if (auth()->user() != null) {
                auth()->user()->productsInFavourites()->sync($id);
                $favourites = auth()->user()->favourites;
                $id = [];
                foreach ($favourites as $fav) {
                    $id[] = $fav->id_product;
                }
            }
        }

        $products = $this->products->getProductFavourites($id);
        return response()->json($products);
    }
}
