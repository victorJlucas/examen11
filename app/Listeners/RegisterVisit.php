<?php

namespace App\Listeners;

use App\Events\UserVisitPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterVisit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserVisitPost $event)
    {
        $event->post->visits+=1;
        $event->post->save();

    }
}
