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
    public function index() {
        $topmenus =$this ->topMenuService -> getAllTopmenu();

        return Inertia::render('Settings/Index',[
            'topmenus' => $topmenus,
        ]);
    } 

}
