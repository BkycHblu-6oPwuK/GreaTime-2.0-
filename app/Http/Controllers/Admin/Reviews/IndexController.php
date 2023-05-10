<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $reviews = Reviews::all();
        return view('admin.reviews.index', compact('reviews'));
    }
}
