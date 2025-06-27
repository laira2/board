<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::where('isDeleted', false)
            ->orderBy('created_at', 'desc')
            ->get();
        
        Log::debug($boards);

        return Inertia::render('Board/Index', [
                'boards' => $boards,
            ]);
    }      
  

    public static function getAllBoards() {

    }
    public function postpage(){
        return Inertia::render('Layouts/BoardLayout');
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'title' => $request['title'],
            'author' => $request['author'],
            'content' => $request['content'],
        ]);
        new BoardResource($board);
        Log::alert("store실행됨");

        return Inertia::location(route('board.index'));
    }
}
