<?php

namespace App\Mail;

use App\Models\MailOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfferSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $Offer;

    public function __construct(MailOffer $Offer)
    {
        $this->Offer = $Offer;
    }

    public function build()
    {
        return $this->view('emails.offer');
    }
}
