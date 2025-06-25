<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public static function index() {
        return Inertia::render('Board/Index');
    }

    public static function getAllBoards() {

        $boards = Board::where('isDeleted',false)
                    ->orderBy('created_at','desc')
                    ->get();
        
        return response()-> json($boards);
    
    }
}
