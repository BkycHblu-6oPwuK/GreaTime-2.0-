<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Models\Promokode;
use Illuminate\Http\Request;

class DeletesController extends BaseController
{
    public function __invoke(Promokode $promokode)
    {
        $promokodes = $promokode->promokodes();
        foreach($promokodes as $promokode){
            $promokode->delete();
        }
        return redirect()->route('admin.promokode.index');
    }
}
