<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Filters\Filters;

class BaseController extends Controller
{
    public $products;

    public function __construct(Filters $products)
    {
        $this->products = $products;
    }
}