<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Service\ProductsService;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Service\PostService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ProductsService $products)
    {
        $this->service = $products;
    }
}
