<?php

namespace Bemember\Auth\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        Route::prefix('api/auth')->middleware('api')->group(__DIR__ . '/../Routes/api.php');
    }
}
