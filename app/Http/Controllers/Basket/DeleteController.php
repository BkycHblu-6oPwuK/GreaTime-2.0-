<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Busket;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Busket $busket)
    {
        $busket->delete();
    }
}
