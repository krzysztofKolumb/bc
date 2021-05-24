<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use Livewire\Component;

class Consultations extends Component
{

    public $consultation;
    public $action;
    public $expert;
    public $title;

    public function mount(){
        $this->action = 'create';
    }

    protected $listeners = ['store'];

    protected $rules = [
        'consultation' => 'string|max:400',
    ];

    protected $messages = [
        'consultation.string' => 'To pole może zawierać jedynie tekst.',
        'consultation.max' => 'To pole może zawierać maksymalnie 200 znaków.',
    ];

    public function selectedItem($id, $action){
        $expert = Expert::find($id);
        $this->expert = $expert;
        $this->consultation = $expert->consultations;
        $this->title = $expert->degree->name . ' ' . $expert->firstname . ' ' . $expert->lastname;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'consultation-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store($content){
        $this->consultation = $content;
        $this->validate();
        if($this->action == 'update'){
            $this->expert->consultations = $this->consultation;
            $this->expert->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }



    public function render()
    {
        $experts = Expert::orderBy('lastname', 'asc')->get();;
        return view('livewire.consultations', compact('experts'));
    }
}
