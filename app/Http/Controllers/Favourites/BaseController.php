<?php

namespace App\Http\Controllers\Favourites;

use App\Http\Controllers\Controller;
use App\Http\Service\Service;

class BaseController extends Controller
{
    public $products;

    public function __construct(Service $products)
    {
        $this->products = $products;
    }
}