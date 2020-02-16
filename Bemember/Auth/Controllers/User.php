<?php

namespace Bemember\Auth\Controllers;

use Bemember\Auth\Resources\UserResource;
use Bemember\Core\Controllers\Controller;

class User extends Controller
{
    public function __invoke()
    {
        return new UserResource(auth()->user());
    }
}
