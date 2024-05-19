<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MailOfferRequest;
use App\Jobs\SendEmailJob;
use App\Mail\OfferSummary;
use App\Models\Client;
use App\Models\MailOffer;
use Illuminate\Support\Facades\Mail;

class MailOfferController extends Controller
{
    public function index()
    {
        return view('Admin.mail_offer.index');
    }

    public function create()
    {
        return view('Admin.mail_offer.create');
    }

    public function store(MailOfferRequest $request)
    {
        $emails = array_filter(Client::whereNotNull('email')->distinct('email')->pluck('email')->toarray(), function ($a) {
            return trim($a) !== '';
        });
        $MailOffer = MailOffer::create(['image' => Upload::UploadFile($request['image'], 'mail_offer')] + $request->only('title', 'desc'));
        // dispatch(new SendEmailJob(['mostafazarea69@gmail.com'], $MailOffer));
        foreach ($emails as $email) {
            Mail::to([$email])->send(new OfferSummary($MailOffer));
        }
        alert()->success(__('trans.EmailSubmited'));

        return redirect()->back();
    }
}
