<?php

// Redirect when Unauthenticated by airlock using route name login
Route::get('unauthenticated')->uses(Bemember\Auth\Controllers\Unauthenticated::class)->name('login');

Route::post('login')->uses(Bemember\Auth\Controllers\Login::class);
Route::post('logout')->uses(Bemember\Auth\Controllers\Logout::class)->middleware(['auth:airlock']);
Route::get('user')->uses(Bemember\Auth\Controllers\User::class)->middleware(['auth:airlock']);
