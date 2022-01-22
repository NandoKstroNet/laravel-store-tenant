<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Services\AuthenticateService;
use App\Services\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class SignUpInController extends Controller
{
    public function index($subdomain)
    {
        return view('front.sign-in-up');
    }

    public function signIn($subdomain, Request $request, AuthenticateService $authenticateService, Store $store)
    {

        $data = $request->validate([
            'login.email' => ['required', 'string', 'email', 'max:255'],
            'login.password' => ['required', Rules\Password::defaults()],
        ]);

        $data['login']['tenant_id'] = $store->whereSubdomain($subdomain)->first()->tenant_id;

        $authenticateService->login($data['login'], new User());

        return redirect()->intended();
    }

    public function signUp($subdomain, Request $request, RegisterService $registerService, Store $store)
    {
        $data = $request->validate([
            'register.name' => ['required', 'string', 'max:255'],
            'register.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register.password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $store = $store->whereSubdomain($subdomain)->first(['id', 'tenant_id']);
        $data['register']['store_id'] =  $store->tenant_id;
        $data['register']['tenant_id'] = $store->id;

        $registerService->register($data['register'], new User());

        return redirect()->intended();
    }

    public function logout($subdomain, Request $request)
    {
        auth()->logout();

        return redirect()->route('front.store', $request->domain);
    }
}
