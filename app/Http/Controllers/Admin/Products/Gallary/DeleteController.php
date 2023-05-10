<?php

namespace App\Http\Controllers\Admin\Products\Gallary;

use App\Http\Controllers\Admin\Products\BaseController;
use App\Models\Gallary;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Products $product,Gallary $gallary)
    {
        Storage::disk('public')->delete($gallary->image);
        $gallary->delete();
        return redirect()->back();
    }
}
