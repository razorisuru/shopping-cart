<?php

namespace razorisuru\ShoppingCart;

use Illuminate\Support\Facades\Session;

class Cart
{
    protected $sessionKey = 'shopping_cart';

    public function add($userId, $itemId, $quantity, $price, $attributes = [])
    {
        $cart = session::get($this->getSessionKey($userId), []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            $cart[$itemId] = [
                'user_id' => $userId,
                'item_id' => $itemId,
                'quantity' => $quantity,
                'price' => $price,
                'attributes' => $attributes,
            ];
        }

        session::put($this->getSessionKey($userId), $cart);
    }

    public function remove($userId, $itemId)
    {
        $cart = session::get($this->getSessionKey($userId), []);
        unset($cart[$itemId]);
        session::put($this->getSessionKey($userId), $cart);
    }

    public function update($userId, $itemId, $quantity)
    {
        $cart = session::get($this->getSessionKey($userId), []);
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $quantity;
            session::put($this->getSessionKey($userId), $cart);
        }
    }

    public function clear($userId)
    {
        session::forget($this->getSessionKey($userId));
    }

    public function clearCart()
    {
        session::forget($this->sessionKey);
    }


    public function getAll($userId)
    {
        return session::get($this->getSessionKey($userId), []);
    }

    public function total($userId)
    {
        $cart = session::get($this->getSessionKey($userId), []);
        return array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));
    }

    public function countQuantity($userId)
    {
        $cart = session::get($this->getSessionKey($userId), []);
        return array_sum(array_column($cart, 'quantity'));
    }

    public function countProducts($userId)
    {
        $cart = session::get($this->getSessionKey($userId), []);
        return count($cart);
    }

    private function getSessionKey($userId)
    {
        return "{$this->sessionKey}_user_{$userId}";
    }
}
