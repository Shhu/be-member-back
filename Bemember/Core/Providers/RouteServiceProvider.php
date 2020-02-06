<?php

namespace Bemember\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function map(): void
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');
        Route::prefix('api')->middleware('api')->group(__DIR__ . '/../Routes/api.php');
    }
}
