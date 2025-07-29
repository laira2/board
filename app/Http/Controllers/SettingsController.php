<?php

namespace App\Http\Controllers;

use App\Services\TopMenuService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public function __construct(
        private TopMenuService $topMenuService,
    )
    {
        
    }
    public function index(Request $request) {
        
        $topmenus =$this ->topMenuService -> getAllTopmenu($request);

        return Inertia::render('Settings/Index',[
            'topmenus' => $topmenus,
        ]);
    } 

}
