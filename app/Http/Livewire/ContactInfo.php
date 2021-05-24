<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use App\Models\Contact;
use Livewire\Component;

class ContactInfo extends Component
{
    public $contact;

    public function mount(){
        $this->contact = Contact::find(1);

    }

    public function render()
    {
        return view('livewire.contact');
    }
}
