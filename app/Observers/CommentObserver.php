<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\History;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        //
        History::create([
            'table_name' => $comment->getTable(),
            'record_id' => $comment->getKey(),
            'action' => 'created',
            'new_data' => $comment->getDirty(),
        ]);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
        History::create([
            'table_name' => $comment->getTable(),
            'record_id' => $comment->getKey(),
            'action' => 'updated',
            'old_data' => $comment->getOriginal(),
            'new_data' => $comment->getDirty(),
        ]);
        
    }

    /**
     * Handle the Board "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
        History::create([
            'table_name' => $comment->getTable(),
            'record_id' => $comment->getKey(),
            'action' => 'deleted',
        ]);
    }


    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
