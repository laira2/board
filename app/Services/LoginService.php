<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginService
{
    public function authenticate(LoginRequest $request)
    {
        $credentails = $request->only('email','password');

        return Auth::attempt($credentails);
    }

}