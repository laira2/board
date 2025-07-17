<?php

namespace App\Http\Controllers;

use App\Models\TopMenu;
use App\Models\Url;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TopMenuController extends Controller
{
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
}
