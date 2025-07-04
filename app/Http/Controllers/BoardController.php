<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Exception;
use Illuminate\Cache\NullStore;
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
    public function createPage($id = null)
    {
        if ($id)
        {
            $board = Board::where('isDeleted',false)
                ->whereId($id)
                ->first();
            return Inertia::render('Board/BoardCreate',[
                'board'=> $board
            ]);
        }else
        {
            return Inertia::render('Board/BoardCreate');
        }
        
    }

    public function store(Request $request)
    {
        try{
               $board = Board::create([
                    'title' => $request['title'],
                    'author' => $request['author'],
                    'content' => $request['content'],
                ]);
                
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

    public function update($id, BoardRequest $request){
        try{
            $board = Board::where('isDeleted',false)
                        ->whereId($id)
                        ->first();

            $board->update($request->validated());
            $updatedBoard = new BoardResource($board);
            
            return Inertia::render('Board/BoardContent',[
                'board' => $updatedBoard->toArray(request())
            ]);            
        }catch(Exception $e){
            $e -> getMessage($e);
        }
    }

    public function destroy($id){

        Board::where('id',$id) -> update([
            'isDeleted'=> true
        ]);

        return Inertia::location("/");
    }
}
