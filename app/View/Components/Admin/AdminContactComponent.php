<?php

namespace App\View\Components\Admin;

use Illuminate\Components\Component;
use App\Models\Contact;

class AdminContactComponent extends Component
{
    public function adminContacts()
    {
        return view('components.admin.admin-contact-component');
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
    public function render()
    {
        $contacts = Contact::paginate(10);
        return view('components.admin.admin-contact-component')->layout('layouts.new-master');
    }
}
