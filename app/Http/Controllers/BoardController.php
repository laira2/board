<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BoardController extends Controller
{
    public static function index()
    {
        $boards = Board::where('isDeleted', false)
            ->orderBy('created_at', 'desc')
            ->get();
        
        Log::debug($boards);
        $data = response()->json($boards);

        return Inertia::render('Board/Index', [
                'data' => $data,
            ]);
    }      
  

    public static function getAllBoards() {

    }
    public function postpage(){
        return Inertia::render('Board/Partials/BoardForm');
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'title' => $request['title'],
            'author' => $request['author'],
            'content' => $request['content'],
        ]);
        new BoardResource($board);

        return Inertia::render('Board/Index');
    }
}
