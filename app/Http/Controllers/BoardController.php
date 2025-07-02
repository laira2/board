<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Exception;
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
        
        Log::debug('index 들어옴'.$boards);
        return Inertia::render('Board/Index', [
                'boards' => $boards,
            ]);
    }      
    public function create()
    {
        return Inertia::render('Board/BoardCreate');
    }

    public function store(Request $request)
    {
        try{
               $board = Board::create([
                    'title' => $request['title'],
                    'author' => $request['author'],
                    'content' => $request['content'],
                ]);
                $newBoard = new BoardResource($board);
                
                return Inertia::location("/board/{$board->id}");
        }catch(Exception $e){
            $e -> getMessage();
        }
        
    }

    public function show($id)
    {
        $board = Board::where('isDeleted',false)
                        ->whereId($id)
                        ->first();

        return Inertia::render('Board/BoardContent',[
            'board' => $board
        ]);
    }
}
