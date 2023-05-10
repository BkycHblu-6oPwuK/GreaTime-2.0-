<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Reviews $review)
    {
        return view('admin.reviews.show', compact('review'));
    }
}
