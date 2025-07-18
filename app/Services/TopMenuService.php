<?php

namespace App\Services;

use App\Models\TopMenu;
use Illuminate\Http\Request;

class TopMenuService
{
    /**
     * 전체 메뉴 조회
     */
    public function getAllTopmenu(){
        $topmenus = TopMenu::get();
        return $topmenus;
    }

    public function createMenu(Request $request)
    {
        $new_menu = TopMenu::create([
            'code'=>$request['code'],
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return $new_menu;
    }
}