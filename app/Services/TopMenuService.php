<?php

namespace App\Services;

use App\Models\TopMenu;
use App\Models\Url;
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
    public function getTopmenu($id){
        $topmenu = TopMenu::whereId($id) ->first();
        return $topmenu;
    }
    public function joinUrl(){
        $menus = Topmenu::leftJoin('url', 'topmenu.code', '=', 'url.topmenu_code')
                ->select('topmenu.*', 'url.url')
                ->get();
        return $menus;

    }

    public function createMenu(Request $request)
    {
        $new_menu = TopMenu::create([
            'code'=>$request['code'],
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        $new_url = Url::create([
            'topmenu_code'=>$request['code'],
            'url' => $request['url'],
        ]);

        return $new_menu;
    }

    public function updateMenu($id, Request $request)
    {
         $validated = $request->validate([
            'code' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'url' => 'required|string|max:255',
        ]);

        $topMenu = $this->getTopmenu($id);
        $url = Url::whereTopmenuCode($topMenu->code)->first();
        $topMenu->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);  
        if ($url) {
            $url->update([
                'topmenu_code' => $validated['code'],
                'url' => $validated['url'],
            ]);
        }
    }

    public function deleteMenu($id)
    {
        $topmenu = TopMenu::fidn($id);
        
        $topmenu -> delete();

    }
}