<?php

namespace App\Http\Controllers\MyReviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $review = auth()->user()->reviews;
        return view('review.index', compact('review'));
    }
}
