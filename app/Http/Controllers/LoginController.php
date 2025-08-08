<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct(
        protected LoginService $loginService
    )
    {
    }
    public function login(LoginRequest $request)
    {
        if($this -> loginService -> authenticate($request))
        {
            $request->session()->regenerate();
            return redirect() ->intended('/');
        };
         return back()->withErrors([
            'login_error' => '이메일 또는 비밀번호가 올바르지 않습니다.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');

    }
    
}
