<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Listeners\NotifyUser;
use App\Mail\UserMail;
use App\Models\User;
class NotifyUser
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
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $user = User::get();
        foreach($user as $row){
            //dd($row->email); perfect
            \Mail::to('nilkantamandal@learningspiral.co.in')->send(new UserMail($event->post));
        }
    }
}
