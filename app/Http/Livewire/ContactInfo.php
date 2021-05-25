<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactInfo extends Component
{
    public $contact;
    public $type;
    public $item;
    public $content;
    public $modal_title = "";

    public function mount(){
        $this->contact = Contact::find(1);
    }

    protected $rules = [
        'contact.name' => 'required|string|max:50',
        'contact.street' => 'required|string|max:50',
        'contact.city' => 'required|string|max:50',
        'contact.phone' => 'required|string|max:50',
        'contact.email' => 'required|string|max:50',
        'contact.open_week' => 'required|string|max:50',
        'contact.open_sat' => 'required|string|max:50',
        'contact.facebook' => 'required|string',
        'contact.instagram' => 'required|string',
        'contact.online_registration' => 'required|string',
        'contact.online_test_results' => 'required|string',
        'contact.location' => 'required|string',
        'contact.access' => 'required|string',
        'contact.parking' => 'required|string',
        'contact.info' => 'required|string',
        'contact.suggestions' => 'required|string',
        'content' => 'string'
    ];

    protected $messages = [
        'contact.name.required' => 'To pole jest wymagane.',
        'contact.name.string' => 'To pole może zawierać jedynie tekst.',
        'contact.name.max' => 'To pole może zawierać maksymalnie 30 znaków.'
    ];

    protected $listeners = ['save'];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectedItem($type, $item){
        $this->type = $type;
        $this->item = $item;

        $titles = [
            'location' => 'Lokalizacja',
            'access' => 'Dojazd',
            'parking' => 'Parking',
            'info' => 'Dane Przychodni',
            'suggestions' => 'Uwagi i sugestie'
        ];

        if($type == 'basic'){
            $message = 'contact-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($type == 'editor'){
            $this->content = $this->contact->$item;
            $this->modal_title = $titles[$item];
            $message = 'contact-content-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate([
            'contact.name' => 'required|string|max:50',
            'contact.street' => 'required|string|max:50',
            'contact.city' => 'required|string|max:50',
            'contact.phone' => 'required|string|max:50',
            'contact.email' => 'required|string|max:50',
            'contact.open_week' => 'required|string|max:50',
            'contact.open_sat' => 'required|string|max:50',
        ]);
        $this->contact->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function save($content){
        $this->content = $content;
        $this->validate([
            'content' => 'string'
        ]);
        $item = $this->item;
        $this->contact->$item = $content;
        $this->contact->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
