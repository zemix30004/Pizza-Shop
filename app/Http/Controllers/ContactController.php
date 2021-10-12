<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactUs;
use App\Models\Contact;
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
            $mail->to('eugenezm@gmail.com')->subject('Contact Message');
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

    public function contactUs()
    {
        return view('contact-us');
    }
    // public function sendMail(Request $request)
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
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required'

        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        return back()->with('success', 'Спасибо вам за обращение к нам!');

        Mail::send('contact_email', [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message'),
        ], function ($message) use ($request) {
            $message->from($request->email);
            $message->to('admin@example.com')->subject('emails.contact-message');
        });
        return back()->with('success', 'Сообщение было успешно отправлено!');
    }
    //     public function contactSubmit(Request $request)
    // {
    //     Mail::send('emails.contactmailform', [
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'msg' => $request->msg
    //     ], function ($mail) use ($request) {
    //         $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
    //         $mail->to("eugenezm@gmail.com")->subject('emails.contact-message');
    //     });
    //     return "Message has been sent succesfully!";
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
    public function adminContact(Request $request)
    {
        $contacts = Contact::paginate(10);
        return view('admin.contact', ['contacts' => $contacts]);
    }
}
