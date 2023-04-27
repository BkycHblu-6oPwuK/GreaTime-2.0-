<?php

namespace App\Http\Controllers\Profiler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('profiler.index',compact('user'));
    }
}
