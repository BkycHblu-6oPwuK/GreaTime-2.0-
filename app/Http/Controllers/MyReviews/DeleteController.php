<?php

namespace App\Http\Controllers\MyReviews;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Reviews $review)
    {
        $review->delete();
        return response()->json(['success'=>'успех']);
    }
}
