<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CommentController extends Controller
{
    //
    public function __construct(
        private CommentService $commentService,
    )
    {
        
    }
    public function show ($boardId){

        $comments = $this -> commentService -> getComments($boardId);

        return $comments;
    }

    public function store(Request $request)
    {
        try{
            $new_comment = $this -> commentService -> createComment($request);
            return Inertia::location("/board/{$new_comment->post_id}");
        }catch(Exception $e){
            return response()->json(['error' => '댓글 저장 실패'], 500);
        }
    }

}
