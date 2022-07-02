<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
  


    public function render()
    {
        $contactsNumber = Contact::all()->count();
       $contacts = Contact::all();

        return view('livewire.admin.admin-contact-component',['contactsNumber'=>$contactsNumber, 'contacts'=>$contacts])->layout('layouts.admin_base');
    }
}
