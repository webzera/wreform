<?php

namespace App\Listeners;

use App\Events\PostCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;


use Mail;
use App\Mail\NewPostMail;

class PostCreateListener
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
     * @param  PostCreateEvent  $event
     * @return void
     */
    public function handle(PostCreateEvent $event)
    {
        // Log::info('from listener method with model datas'.$event->post);
        Mail::to('johnszen@gmail.com')->send(new NewPostMail($event->post));
    }
}
