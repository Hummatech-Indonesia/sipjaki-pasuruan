<?php

namespace App\Observers;

use App\Models\HistoryLogin;
use Faker\Provider\Uuid;

class HistoryLoginObserver
{

    /**
     * creating
     *
     * @param  mixed $historyLogin
     * @return void
     */
    public function creating(HistoryLogin $historyLogin): void
    {
        $historyLogin->id = Uuid::uuid();
        $historyLogin->user_id = auth()->user()->id;
    }

    /**
     * Handle the HistoryLogin "created" event.
     */
    public function created(HistoryLogin $historyLogin): void
    {
        //
    }

    /**
     * Handle the HistoryLogin "updated" event.
     */
    public function updated(HistoryLogin $historyLogin): void
    {
        //
    }

    /**
     * Handle the HistoryLogin "deleted" event.
     */
    public function deleted(HistoryLogin $historyLogin): void
    {
        //
    }

    /**
     * Handle the HistoryLogin "restored" event.
     */
    public function restored(HistoryLogin $historyLogin): void
    {
        //
    }

    /**
     * Handle the HistoryLogin "force deleted" event.
     */
    public function forceDeleted(HistoryLogin $historyLogin): void
    {
        //
    }
}
