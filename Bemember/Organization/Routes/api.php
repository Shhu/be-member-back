<?php

namespace Bemember\Organization\Controllers;

\Route::get('/')->uses(Index::class)->middleware('auth:airlock');
\Route::get('{organization}')->uses(Edit::class)->middleware('auth:airlock');
