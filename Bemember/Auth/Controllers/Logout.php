<?php

namespace Bemember\Auth\Controllers;

use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;

class Logout extends Controller
{
    public function __invoke(Request $request)
    {
        auth()->user()->tokens->each->delete();

        return \response()->json(['logout' => true]);
    }
}
