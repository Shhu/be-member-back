<?php

namespace Bemember\Auth\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Bemember\Core\Controllers\Controller;

class Logout extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        auth()->user()->tokens->each->delete();

        return \response()->json(['logout' => true]);
    }
}
