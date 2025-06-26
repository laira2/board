<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public static function index() {
        $boards = Board::where('isDeleted',false)
                    ->orderBy('created_at','desc')
                    ->get();
        
        return response()-> json($boards);
        return Inertia::render('Board/Index');
    }

    public static function getAllBoards() {

        
    
    }

    public function store(Request $request){
        $board = Board::create([
            'title' => $request['title'],
            'author' => $request['author'],
            'content' => $request['content'],
        ]);

        return new BoardResource($board);
    }
}
