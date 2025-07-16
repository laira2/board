<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\App;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::orderBy('created_at', 'desc')
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
            $board = Board::whereId($id)
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
        try{
            Log::debug("board show 실행");
            $board = Board::whereId($id)
                        ->first();

            $CommentController = App(CommentController::class);
            $comments = $CommentController->show($id);

            if ($comments != null){
                Log::alert("comment 존재 시 return");
                return Inertia::render('Board/BoardContent',[
                    'board' => $board,
                    'comments' => $comments
                ]);
            }else{
                return Inertia::render('Board/BoardContent',[
                    'board' => $board,
                ]);
            }
            
        }catch(Exception $e){
            $e -> getMessage();
        }
        
    }

    public function update($id, BoardRequest $request){
        try{
            $board = Board::whereId($id)
                        ->first();

            $board->update($request->validated());
            $updatedBoard = new BoardResource($board);
            
            return Inertia::render('Board/BoardContent',[
                'board' => $updatedBoard->toArray(request())
            ]);            
        }catch(Exception $e){
            $e -> getMessage();
        }
    }

    public function destroy($id){

        Board::where('id',$id) -> delete();

        return Inertia::location("/");
    }
}
