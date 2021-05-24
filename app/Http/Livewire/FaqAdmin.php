<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqAdmin extends Component
{
    public $action;
    public $faq;

    public function mount(){
        $this->action = 'create';
    }

    protected $listeners = ['store'];

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

    public function openModal(){
        $this->faq = new Faq();
        $this->action = 'create';
        $message = 'faq-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $faq = Faq::find($id);
        $this->faq = $faq;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'faq-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'faq-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function store($question, $answear){
        $this->faq->question = $question;
        $this->faq->answear = $answear;
        $this->validate();
        if($this->action == 'create'){
            $this->faq->save();
            $message = 'Dodano faq!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
        if($this->action == 'update'){
            $this->faq->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function delete(){
        if($this->faq){
            $this->faq->delete();
            $message = 'Usunięto faq!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        $faqs = Faq::orderBy('question', 'asc')->get();
        return view('livewire.faq-admin', compact('faqs'));
    }
}
