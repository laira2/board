<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService
{
    /**
     * 댓글 조회
     */
    public function getComments($boardId)
    {
        $comments = Comment::with('allChildren')
                    ->where('post_id', $boardId)
                    ->whereNull('parent_id')          
                    ->orderBy('created_at')
                    ->get();
        return $comments;
    }

    /**
     * 댓글 저장
     */

    public function createComment(Request $request)
    {
        $new_comment = Comment::create([
                'author'=>$request['author'],
                'comment' => $request['comment'],
                'post_id' => $request['post_id'],
                'parent_id'=> $request['parent_id']??null,
                'depth' => $request['depth']??0
            ]);

        return  $new_comment;
    }

    
}