<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Promokode;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Promokode $promokode)
    {
       return view('admin.promokode.show',compact('promokode'));
    }
}
