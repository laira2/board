<?php

namespace App\Http\Controllers;

use App\Models\TopMenu;
use App\Models\Url;
use App\Services\TopMenuService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class TopMenuController extends Controller
{
    public function __construct(
        private TopMenuService $topMenuService,
    )
    {
        
    }
    /**
     * Topmenu 생성
     */
    public function store (Request $request)
    {
        Log::debug("topmenu store 시작");
        $this -> topMenuService -> createMenu($request);
        return Inertia::location("/settings");
    }

    /**
     * Topmenu 수정
     */
    public function update (Request $request, $id)
    {
        $this -> topMenuService -> updateMenu($id, $request);
        return Inertia::location("/settings");

    }

    /**
     * Topmenu 삭제
     */
    public function destroy($id)
    {
        $this -> topMenuService -> deleteMenu($id);
        return Inertia::location("/settings");
    }
}
