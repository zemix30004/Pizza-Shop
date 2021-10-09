<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
    public function store(ContactRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);
        if ($validator->fails()) {
            return view('contact')->withErrors($validator);
        }

        Mail::send('emails.contact-message', [
            'message' => $request->message
        ], function ($mail)  use ($request) {
            $mail->from($request->email, $request->name);
            $mail->to('admin@example.com')->subject('Contact Message');
        });
        return redirect()->back()->with('flash_message', 'Спасибо вам за сообщение');
    }
    // return back()->with("message", "Ваше сообщение успешно отправлено!");
    // $request->validate([
    //     'name' => 'reqiured|min:2|max:20',
    //     'phone' => 'required|number|min:7|max:20',
    //     'email' => 'reqiured|min:4|max:100',
    //     'message' => 'required|min:15|max:500'
    // ]);
}
    // public function contact()
    // {
    //     return view('contact-us');
    // }
    // public function sendEmail(Request $request)
    // {
    //     $details = [
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'message' => $request->message

    //     ];
    //     Mail::to('eugenezm@gmail.com')->send(new ContactMail($details));
    //     return back()->with('message_sent, "Ваше сообщение успешно отправлено!');
    // }
    // public function contact(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'reqiured|min:2|max:20',
    //         'phone' => 'required|number|min:7|max:20',
    //         'email' => 'reqiured|min:4|max:100',
    //         'message' => 'required|min:15|max:500'
    //     ]);
    //     if ($validator->fails()) {
    //         return view('contact-us')->withErrors($validator);
    //     }

    //     $name = $request->input("name");
    //     $phone = $request->input("phone");
    //     $email = $request->input("email");
    //     $message = $request->input("message");

    //     Mail::to("eugenezm@gmail.com")->send(new ContactUs($name, $phone, $email, $message));

    //     return back()->with("message", "Ваше сообщение успешно отправлено!");
    // }
