<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CommentController extends Controller
{
    //

    public function show ($boardId){
        Log::debug("show 실행");
        $comments = Comment::with('allChildren')
                    ->where('post_id', $boardId)
                    ->whereNull('parent_id')          
                    ->orderBy('created_at')
                    ->get();
        Log::debug("조회 완료".$comments);
        return $comments;
    }

    public function store(Request $request)
    {
        try{
            $comment = Comment::create([
                'author'=>$request['author'],
                'comment' => $request['comment'],
                'post_id' => $request['post_id'],
                'parent_id'=> $request['parent_id']??null,
                'depth' => $request['depth']??0
            ]);
            return Inertia::location("/board/{$comment->post_id}");
        }catch(Exception $e){
            return response()->json(['error' => '댓글 저장 실패'], 500);
        }
    }

}
