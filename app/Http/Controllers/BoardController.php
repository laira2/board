<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Models\TopMenu;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\BoardService;
use App\Services\CommentService;
use App\Services\TopMenuService;

class BoardController extends Controller
{
    public function __construct(
        private BoardService $boardService,
        private CommentService $commentService,
        private TopMenuService $topMenuService

    )
    {        
    }

    public function index(Request $request)
    {
        $boards = $this -> boardService -> getBoards($request);
        $topmenus = $this -> topMenuService -> getAllTopmenu();
       
        return Inertia::render('Board/Index', [
                'boards' => $boards,
                'topmenus'=> $topmenus
            ]);
    }  
    
    public function createPage($id = null)
    {
        if ($id)
        {
            $board = $this->boardService ->getBoard($id);

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
               
            $new_board = $this->boardService->createPost($request);
            return Inertia::location("/board/{$new_board->id}");

        }catch(Exception $e){
            $e -> getMessage();
        }
        
    }

    public function show($id)
    {
        try{
            $board = $this -> boardService -> getBoard($id);

            
            $comments = $this -> commentService -> getComments($id);

            if ($comments != null){
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
            
            
            $updated_board = $this -> boardService ->updateBoard($id, $request);
            
            return Inertia::render('Board/BoardContent',[
                'board' => $updated_board
            ]);            
        }catch(Exception $e){
            $e -> getMessage();
        }
    }

    public function destroy($id){

        $this -> boardService -> deleteBoard($id);

        return Inertia::location("/");
    }
}
