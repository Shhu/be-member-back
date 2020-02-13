<?php

namespace Bemember\Auth\Controllers;

use Bemember\Core\Controllers\Controller;

class Unauthenticated extends Controller
{
    public function __invoke()
    {
        return \response(['error' => 'Unauthenticated.'], 401);
    }
}
