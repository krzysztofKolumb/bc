<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqAdmin extends Component
{

    public $action;
    public $selected;
    public $faq;

    public function mount(){
        $this->action = 'create';
        $this->faq = new Faq();
    }

    protected $listeners = ['updateList'];

    protected $rules = [
        'faq.question' => 'required|string',
        'faq.answear' => 'string',
    ];

    protected $messages = [
        'faq.question.required' => 'To pole jest wymagane.',
        'faq.question.string' => 'To pole może zawierać jedynie tekst.',
        'faq.answear.string' => 'To pole może zawierać jedynie tekst.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updateList(){}

    public function openDeleteModal($id){
        $selected = Faq::find($id);
        $this->selected = $selected;
        $message = 'faq-delete-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);

    }

    public function delete(){
        if($this->selected){
            $toDelete = Faq::find($this->selected->id);
            $toDelete->delete();
            // $this->packages = LabPackage::all();
            $this->selected = null;
            $message = 'Usunięto FAQ!';
            $this->dispatchBrowserEvent('close-delete-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        $faqs = Faq::orderBy('question', 'asc')->get();
        return view('livewire.faq-admin', compact('faqs'));
    }
}
