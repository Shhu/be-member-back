<?php

use \Illuminate\Support\Facades\Route;

Route::get('/')->uses(\Bemember\Core\Controllers\Home::class);
