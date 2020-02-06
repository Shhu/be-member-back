<?php

namespace Bemember\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Bemember\Association\Providers\AssociationServiceProvider;
use Bemember\Place\Providers\PlaceServiceProvider;
use Bemember\Product\Providers\ProductServiceProvider;
use Bemember\User\Providers\UserServiceProvider;
use Bemember\Auth\Providers\AuthServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->register(TelescopeServiceProvider::class);

//        app()->register(AssociationServiceProvider::class);
        app()->register(AuthServiceProvider::class);
//        app()->register(PlaceServiceProvider::class);
//        app()->register(ProductServiceProvider::class);
        app()->register(UserServiceProvider::class);
    }

    public function boot(): void
    {
        //
    }
}
