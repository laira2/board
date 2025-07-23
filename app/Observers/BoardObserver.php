<?php

namespace App\Observers;

use App\Models\Board;
use App\Models\History;
use Illuminate\Support\Facades\Log;

class BoardObserver
{
    /**
     * Handle the Board "created" event.
     */
    public function created(Board $board): void
    {
        //
        Log::info('[BoardObserver] updated called.', [
            'table_name' => $board->getTable(),
            'record_id' => $board->getKey(),
            'action' => 'created',
            'new_data' => $board->getDirty(),
        ]);
        History::create([
            'table_name' => $board->getTable(),
            'record_id' => $board->getKey(),
            'action' => 'created',
            'new_data' => $board->getDirty(),
        ]);
    }

    /**
     * Handle the Board "updated" event.
     */
    public function updated(Board $board): void
    {
        //
        History::create([
            'table_name' => $board->getTable(),
            'record_id' => $board->getKey(),
            'action' => 'updated',
            'old_data' => $board->getOriginal(),
            'new_data' => $board->getDirty(),
        ]);
        
    }

    /**
     * Handle the Board "deleted" event.
     */
    public function deleted(Board $board): void
    {
        //
        History::create([
            'table_name' => $board->getTable(),
            'record_id' => $board->getKey(),
            'action' => 'deleted',
        ]);
    }

    /**
     * Handle the Board "restored" event.
     */
    public function restored(Board $board): void
    {
        //
    }

    /**
     * Handle the Board "force deleted" event.
     */
    public function forceDeleted(Board $board): void
    {
        //
    }
}
