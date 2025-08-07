<?php

namespace App\Services;

use App\Http\Requests\RegistRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RegisterService
{
    /**
     * 사용자 등록
     */
    public function regist_user(RegistRequest $request)
    {
        Log::alert("regist_user 실행");
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password']
        ]);
        Log::alert("regist_user 실행 완료");
        return $user;
    }

}