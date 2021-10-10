<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Contact;


class ContactComponent extends Component
{
    public function contact()
    {
        return view('components.contact-component');
    }
    public $name;
    public $email;
    public $phone;
    public $message;

    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name' => 'required|min:2|max:20',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required|max:500'
        ]);
    }
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required|min:2|max:20',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required|max:500'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->phone = $this->phone;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->save();
        session()->flash('message', 'Your message has been submitted successfully');
    }
    public function render()
    {
        return view('components.contact-component')->layout('layouts.new-master);
    }
}
