<?php

namespace App\Listeners;

use App\Events\DeletedPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\File;

class LogDeletion
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
     * @param  DeletedPost  $event
     * @return void
     */
    public function handle(DeletedPost $event)
    {
        $name = $event->post->title;
        File::append(storage_path('/logs/blog2.log'), 'Finalmente el post '. $name .' ha sido borrado.' . "\n"."<br>");
    }
}
