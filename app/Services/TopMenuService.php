<?php

namespace App\Services;

use App\Models\TopMenu;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopMenuService
{
    /**
     * 전체 메뉴 조회
     */
    public function getAllTopmenu(Request $request){
        $perPage = $request ->input('per_page' ,10);
        
        Log::debug("pagination 적용 perPage 전체 조회".$perPage);

        $topmenus = Topmenu::leftJoin('urls', 'topmenus.code', '=', 'url.topmenu_code')
                ->select('topmenus.*', 'urls.url')
                ->paginate($perPage);
                
        Log::debug("pagination 적용 topmenu 전체 조회".$topmenus);
        return $topmenus;
    }

    /**
     * Topmenu 단일 조회
     */
    public function getTopmenu($id){
        $topmenu = TopMenu::whereId($id) ->first();
        return $topmenu;
    }

    /**
     * 메뉴, Url 합친 값
     */
    public function joinUrl(){
        $menus = Topmenu::leftJoin('urls', 'topmenus.code', '=', 'urls.topmenu_code')
                ->where('topmenus.is_activate',true)
                ->select('topmenus.*', 'urls.url')
                ->get();
        return $menus;

    }

    /**
     * 메뉴 생성
     */
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

    /**
     * 메뉴 수정
     */
    public function updateMenu($id, Request $request)
    {
         $validated = $request->validate([
            'code' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'url' => 'required|string|max:255',
            'is_activate' => 'required'
        ]);

        $topMenu = $this->getTopmenu($id);
        $url = Url::whereTopmenuCode($topMenu->code)->first();
        $topMenu->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'is_activate' => $validated['is_activate']
        ]);  
        if ($url) {
            $url->update([
                'topmenu_code' => $validated['code'],
                'url' => $validated['url'],
            ]);
        }
    }

    /**
     * 메뉴 삭제
     */
    public function deleteMenu($id)
    {
        $topmenu = TopMenu::find($id);
        
        $topmenu -> delete();

    }
    
    /**
     * 메뉴 검색
     */
    public function searchMenu($search_key)
    {
        $searchedmenus = Topmenu::leftJoin('urls', 'topmenus.code', '=', 'urls.topmenu_code')
                                ->where('topmenus.name','like',"%$search_key%")
                                ->orWhere('topmenus.code','like',"%$search_key%")
                                ->paginate(10);     
        return $searchedmenus;
    }

}