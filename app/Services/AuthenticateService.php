<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthenticateService
{
    public function __construct(private User $user) {}

    public function login($credentials)
    {
        $findUser = $this->user->where('tenant_id', $credentials['tenant_id'])
                         ->where('email', $credentials['email'])
                         ->first();

        if(!$findUser)
            throw new UnauthorizedHttpException("Invalid Credentials");

        if(!Hash::check($credentials['password'], $findUser->password))
            throw new UnauthorizedHttpException("Invalid Credentials");

        auth()->login($findUser);

        return true;
    }

    public function logout()
    {
        auth()->logout();
    }
}
