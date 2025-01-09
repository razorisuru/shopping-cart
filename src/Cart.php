<?php

namespace razorisuru\ShoppingCart;

use Illuminate\Support\Facades\Session;

class Cart
{
    protected $sessionKey = 'shopping_cart';

    public function add($itemId, $quantity, $price, $attributes = [])
    {
        $cart = session::get($this->sessionKey, []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            $cart[$itemId] = [
                'quantity' => $quantity,
                'price' => $price,
                'attributes' => $attributes,
            ];
        }

        session::put($this->sessionKey, $cart);
    }

    public function remove($itemId)
    {
        $cart = session::get($this->sessionKey, []);
        unset($cart[$itemId]);
        session::put($this->sessionKey, $cart);
    }

    public function update($itemId, $quantity)
    {
        $cart = session::get($this->sessionKey, []);
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $quantity;
            session::put($this->sessionKey, $cart);
        }
    }

    public function clear()
    {
        session::forget($this->sessionKey);
    }

    public function getAll()
    {
        return session::get($this->sessionKey, []);
    }

    public function total()
    {
        $cart = session::get($this->sessionKey, []);
        return array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));
    }
}
