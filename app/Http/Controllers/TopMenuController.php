<?php

namespace App\Http\Controllers;


use App\Services\TopMenuService;
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
        Log::debug("menu 수정");
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

    /**
     * Topmenu 검색
     */
    public function search(Request $request)
    {
        $keyword = $request -> input('search_key');
        $menus = $this -> topMenuService -> searchMenu($keyword);
        Log::debug("menus".$menus);
        return Inertia::render('Settings/Index',[
            'topmenus' => $menus,
        ]);
    }
}
