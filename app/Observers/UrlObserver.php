<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Url;

class UrlObserver
{
    /**
     * Handle the url "created" event.
     */
    public function created(Url $url): void
    {
        //
        History::create([
            'table_name' => $url->getTable(),
            'record_id' => $url->getKey(),
            'action' => 'created',
            'new_data' => $url->getDirty(),
        ]);
        
    }

    /**
     * Handle the url "updated" event.
     */
    public function updated(Url $url): void
    {
        //
        History::create([
            'table_name' => $url->getTable(),
            'record_id' => $url->getKey(),
            'action' => 'updated',
            'old_data' => $url->getOriginal(),
            'new_data' => $url->getDirty(),
        ]);
        
    }

    /**
     * Handle the Board "deleted" event.
     */
    public function deleted(Url $url): void
    {
        //
        History::create([
            'table_name' => $url->getTable(),
            'record_id' => $url->getKey(),
            'action' => 'deleted',
        ]);
    }

    /**
     * Handle the url "restored" event.
     */
    public function restored(url $url): void
    {
        //
    }

    /**
     * Handle the url "force deleted" event.
     */
    public function forceDeleted(url $url): void
    {
        //
    }
}
