<?php

namespace App\Http\Controllers\Profiler;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateControllder extends Controller
{
    public function __invoke(User $user,UserRequest $request)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('profiler.index');
    }
}
