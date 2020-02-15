<?php

namespace Bemember\User\Controllers;

\Route::get('/')->uses(Index::class)->middleware('auth:airlock');
\Route::get('{user}/edit')->uses(Edit::class)->middleware('auth:airlock');
