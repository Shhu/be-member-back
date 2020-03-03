<?php

namespace Bemember\Subscription\Controllers;

\Route::get('/')->uses(Index::class)->middleware('auth:airlock');
\Route::get('{subscription}')->uses(Edit::class)->middleware('auth:airlock');
