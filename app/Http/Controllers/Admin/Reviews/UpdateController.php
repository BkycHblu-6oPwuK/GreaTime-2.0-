<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\UpdateRequest;
use App\Models\Reviews;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Reviews $review,UpdateRequest $request)
    {
        $data = $request->validated();
        $review->update($data);
        return redirect()->route('admin.reviews.index');
    }
}
