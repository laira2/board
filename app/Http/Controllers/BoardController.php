<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public static function index() {
        return Inertia::render('Board/Index');
    }

    public static function getAllBoards() {
    
    }
}
