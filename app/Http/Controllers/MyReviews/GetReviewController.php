<?php

namespace App\Http\Controllers\MyReviews;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class GetReviewController extends Controller
{
    public function __invoke()
    {
        $reviews = auth()->user()->reviews()->select('id', 'id_prod', 'status', 'created_at', 'reason')->get();
        foreach($reviews as $key => $review){
            $reviews[$key]['date'] = $review->getCreatedAtFormatted();
            $reviews[$key]['product'] = $review->products->name;
            unset($reviews[$key]['products']);
        }
        return response()->json($reviews);
    }
}
