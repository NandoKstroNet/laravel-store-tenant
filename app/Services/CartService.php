<?php
namespace App\Services;

use Illuminate\Session\SessionManager as Session;

class CartService
{
    const CART_KEY = 'cart';

    public function __construct(private Session $session)
    {
    }

    public function all()
    {
        $items = $this->session->get(self::CART_KEY);
        return $items;
    }

    public function add($item)
    {
        if($this->session->has(self::CART_KEY)) {
            if($this->itemExistsInCart($item)) throw new \Exception("Product Already Exists In Car");

            $this->session->push(self::CART_KEY, $item);

        } else {
            $this->session->put(self::CART_KEY, [$item]);
        }
    }

    public function remove($item)
    {
        $items = $this->session->get(self::CART_KEY);

        $items = array_filter($items, function($line) use($item){
            return $line['slug'] != $item;
        });

        $this->session->put(self::CART_KEY, $items);
    }

    public function clear()
    {
        $this->session->forget(self::CART_KEY);
    }

    private function itemExistsInCart($item): bool
    {
        $items = $this->session->get(self::CART_KEY);

        $somethingCartSlugs = array_column($items, 'slug');

        return in_array($item['slug'], $somethingCartSlugs);
    }
}
