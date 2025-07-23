<?php

namespace App\Observers;

use App\Models\History;
use App\Models\TopMenu;

class TopmenuObserver
{
    /**
     * Handle the TopMenu "created" event.
     */
    public function created(TopMenu $topMenu): void
    {
        //
        History::create([
            'table_name' => $topMenu->getTable(),
            'record_id' => $topMenu->getKey(),
            'action' => 'created',
            'new_data' => $topMenu->getDirty(),
        ]);
        
    }

    /**
     * Handle the TopMenu "updated" event.
     */
    public function updated(TopMenu $topMenu): void
    {
        //
        History::create([
            'table_name' => $topMenu->getTable(),
            'record_id' => $topMenu->getKey(),
            'action' => 'updated',
            'old_data' => $topMenu->getOriginal(),
            'new_data' => $topMenu->getDirty(),
        ]);
        
    }

    /**
     * Handle the Board "deleted" event.
     */
    public function deleted(TopMenu $topMenu): void
    {
        //
        History::create([
            'table_name' => $topMenu->getTable(),
            'record_id' => $topMenu->getKey(),
            'action' => 'deleted',
        ]);
    }


    /**
     * Handle the TopMenu "restored" event.
     */
    public function restored(TopMenu $topMenu): void
    {
        //
    }

    /**
     * Handle the TopMenu "force deleted" event.
     */
    public function forceDeleted(TopMenu $topMenu): void
    {
        //
    }
}
