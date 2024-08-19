<?php

namespace App\Listeners;

use App\Events\welcomeMailEvent;
use App\Http\Middleware\logger;
use App\Mail\WelcomeUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sentEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(welcomeMailEvent $event): void
    {
        logger('in handle.....');
        $username = $event->username;
        $email = $event->email;
        Mail::to($email, $username)->send(new WelcomeUserMail($username));
    }

}
