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
        // return redirect()->to('home.index');
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
                
                Log::alert("newBoard생성");
                Log::alert("{$board ->id}");
                return Inertia::location("/board/{$board->id}");
                // return redirect()->route('boardpost.show', $board->id);
                // return redirect()->away('https://www.google.com');
                // return Inertia::render('Board/BoardContent',[
                //     'board' => $newBoard
                // ]);

                // return redirect()->to('home.index');
                // return response([
                //     'success'=> true
                // ]);
        }catch(Exception $e){
            $e -> getMessage();
        }
        
    }

    public function show($id)
    {
        Log::debug("Board/show 실행");
        Log::debug("Request headers: " . json_encode(request()->headers->all()));
        Log::debug("Is Inertia request: " . (request()->header('X-Inertia') ? 'YES' : 'NO'));
        
        $board = Board::where('isDeleted',false)
                        ->whereId($id)
                        ->first();
        Log::debug("조회된 board: ".$board);

        return Inertia::render('Board/BoardContent',[
            'board' => $board
        ]);
    }
}
