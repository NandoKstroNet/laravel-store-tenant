<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cartService, private Store $store)
    {
    }

    public function index()
    {
        $cart = $this->cartService->all();

        return view('front.cart', compact('cart'));
    }

    public function add($subdomain, $product)
    {
        $store = $this->store->whereSubdomain($subdomain)->first();
        $product = $store->products()->whereSlug($product)->first()->toArray();

        $this->cartService->add($product);

        return redirect()->route('front.store', $subdomain);
    }

    public function remove($subdomain, $product)
    {
        $store = $this->store->whereSubdomain($subdomain)->first();
        $product = $store->products()->whereSlug($product)->first()->toArray();

        $this->cartService->remove($product);

        return redirect()->route('front.store', $subdomain);
    }

    public function cancel($subdomain)
    {
        $this->cartService->clear();
        return redirect()->route('front.store', $subdomain);
    }
}
