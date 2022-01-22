<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class RegisterService
{
    public function __construct(private User $user) {}

    public function register($data)
    {
        auth()->login($this->user->create($data));

        return true;
    }
}
