<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;

class welcomeMailSender implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $email, public $userName)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email, $this->userName)->send(new WelcomeUserMail($this->userName));
    }
}
