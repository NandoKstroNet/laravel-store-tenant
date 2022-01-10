<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Services\CartService;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index($subdomain, Store $store, CartService $c)
    {
        $store = $store->whereSubdomain($subdomain)->with('products')->firstOrFail();

        return view('front.home-stores', compact('store'));
    }
}
