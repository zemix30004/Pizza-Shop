<?php

namespace App\Http\Controllers;

use App\Jobs\QueueSenderEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index()
    {
        return view('emails.sendmail');
    }
    // public function send($message)
    // {
    //     $qs = (new QueueSenderEmail($message))->delay(now()->addMinutes(3));
    //     $this->dispatch($qs);

    //     return redirect()

    //         ->back()
    //         ->with('message', "Сообщение отправлено");
    // }
    // public function sendMail(Request $request)
    // {
    //     if ($request->method() === 'POST') {
    //         // sleep(5);
    //         Mail::to('hello@example.com')->send((new SendMail())->from('noreply@test.com'));
    //     }
    //     return view('emails.sendmail');
    // }
    public function send($message)
    {
        // $qs = new QueueSenderEmail($message);
        // $this->dispatch($qs);
        $qs = (new QueueSenderEmail($message))->delay(now()->addMinutes(2));
        $this->dispatch($qs);

        return redirect()
            ->back()
            ->with('mess', "Сообщение отправлено");
    }
}
