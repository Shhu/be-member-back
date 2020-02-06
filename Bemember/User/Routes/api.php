<?php

namespace Bemember\User\Controllers;

\Route::get('fetch')->uses(Fetch::class)->middleware('auth:airlock');
\Route::get('{user}/edit')->uses(Edit::class)->middleware('auth:airlock');
