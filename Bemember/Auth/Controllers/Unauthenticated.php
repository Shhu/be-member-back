<?php

namespace Bemember\Auth\Controllers;

use Bemember\Core\Controllers\Controller;
use Illuminate\Http\Response;

class Unauthenticated extends Controller
{
    public function __invoke(): Response
    {
        return \response(['error' => 'Unauthenticated.'], 401);
    }
}
