<?php

namespace App\Jobs;

use App\Mail\SendEmailWelcome;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        Mail::to($this->details['email'])->send(new SendEmailWelcome($this->details['name']));
    }
}
