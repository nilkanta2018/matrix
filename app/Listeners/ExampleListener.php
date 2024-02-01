<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use App\Events\NewNotificationEvent;
class ExampleListener implements ShouldQueue
{
   
    public function handle(NewNotificationEvent $email)
    {
        //dd($email->email);
        Mail::to($email->email)->send(new NotificationEmail($email));
        logger('Event handled: ' .$email->email);
    }
}
