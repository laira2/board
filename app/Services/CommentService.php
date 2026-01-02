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
                    ->wherePostId($boardId)
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
        $validated = $request->validate([
            'author' => 'required|string',
            'comment' => 'required|string',
            'post_id' => 'required|int',
            'parent_id' => 'nullable|int',
            'depth' => 'nullable|int',
        ]);

        $new_comment = Comment::create($validated);

        return  $new_comment;
    }

    
}