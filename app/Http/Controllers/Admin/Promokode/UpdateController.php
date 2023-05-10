<?php

namespace App\Http\Controllers\Admin\Promokode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Promokode\UpdateRequest;
use App\Models\Promokode;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Promokode $promokode)
    {
        $data = $request->validated();
        $data['percent'] = $data['percent'] / 100;
        $promokodes = $promokode->promokodes();
        foreach($promokodes as $promokode){
            $promokode->update($data);
        }
        return redirect()->route('admin.promokode.show',$promokode->id);
    }
}
