<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistRequest;
use App\Services\RegisterService;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function __construct(
        protected RegisterService $registerService,

    )
    {
        
    }
    public function store (RegistRequest $request){
        Log::debug("RegisterController store 진입");
        $new_user = $this -> registerService -> regist_user($request);
        Log::debug("RegistController store 실행: ".$new_user);
        return Inertia::location('/auth/login');
    }
}
