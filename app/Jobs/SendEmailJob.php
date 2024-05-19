<?php

namespace App\Jobs;

use App\Mail\OfferSummary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $Emails;

    public $Offer;

    public function __construct($Emails, $Offer)
    {
        $this->Emails = $Emails;
        $this->Offer = $Offer;
    }

    public function handle()
    {
        $email = new OfferSummary($this->Offer);
        Mail::to($this->Emails)->send($email);
    }
}
