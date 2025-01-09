<?php

namespace razorisuru\ShoppingCart;

use Illuminate\Support\ServiceProvider;

class ShoppingCartServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Cart::class, function ($app) {
            return new Cart();
        });
    }

    public function boot()
    {
        // You can publish config or migrations here if needed
    }
}
