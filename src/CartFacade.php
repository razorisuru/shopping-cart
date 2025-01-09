<?php

namespace razorisuru\ShoppingCart;

use Illuminate\Support\Facades\Facade;

class CartFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Cart::class;
    }
}
