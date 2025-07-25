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
    //
    public function handle ($code)
    {
        try{
            $menu = TopMenu::whereCode($code)
                            ->first();
            $url = Url::whereTopmenuCode($menu['code'])
                        ->first();
                        
            return Inertia::render($url);

        }catch(Exception $e){

        }
        
        
    }

    public function store (Request $request)
    {
        Log::debug("topmenu store 시작");
        $this -> topMenuService -> createMenu($request);
        // $topmenus =$this ->topMenuService -> getAllTopmenu();
        return Inertia::location("/settings");
    }
    
    public function update (Request $request, $id)
    {
        $this -> topMenuService -> updateMenu($id, $request);
        return Inertia::location("/settings");

    }

    public function destroy($id)
    {
        $this -> topMenuService -> deleteMenu($id);
        return Inertia::location("/settings");
    }
}
