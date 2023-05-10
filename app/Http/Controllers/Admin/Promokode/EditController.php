<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Promokode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EditController extends BaseController
{
    public function __invoke(Promokode $promokode)
    {
        return view('admin.promokode.edit',compact('promokode'));
    }
}
