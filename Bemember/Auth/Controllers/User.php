<?php

namespace Bemember\Auth\Controllers;

use Bemember\Core\Controllers\Controller;

class User extends Controller
{
    public function __invoke()
    {
        return \response()->json(['user' => auth()->user()->only(['id', 'name', 'email', 'is_admin'])]);
    }
}
