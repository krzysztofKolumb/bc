<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

class PageHome extends Component
{

    public $section;
    public $action;

    // public function mount(){
    // }

    protected $rules = [
        'section.title' => 'string',
        'section.subtitle' => 'string',
        'section.header' => 'string',
        'section.content' => 'string'

    ];

    protected $messages = [
        'section.title.string' => 'To pole może zawierać jedynie tekst.',
        'section.subtitle.string' => 'To pole może zawierać jedynie tekst.',
        'section.header.string' => 'To pole może zawierać jedynie tekst.',
        'section.content.string' => 'To pole może zawierać jedynie tekst.',

    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectedItem($id, $action){
        $section = Section::find($id);
        $this->section = $section;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'section-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function update(){
        $this->validate();
        $this->section->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        $sections = Section::where('page_id', 1)->get();
        return view('livewire.page-home', compact('sections'));
    }
}
