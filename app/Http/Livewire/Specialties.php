<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use Livewire\Component;
use Illuminate\Support\Str;


class Specialties extends Component
{
    public $specialty;
    public $action;
    public $canDelete = false;

    public function mount(){
        $this->action = 'create';
    }

    protected $rules = [
        'specialty.name' => 'required|string|max:30'
    ];

    protected $messages = [
        'specialty.name.required' => 'To pole jest wymagane.',
        'specialty.name.string' => 'To pole może zawierać jedynie tekst.',
        'specialty.name.max' => 'To pole może zawierać maksymalnie 30 znaków.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->specialty = new Specialty();
        $this->action = 'create';
        $message = 'specialty-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->specialty->name = null;
    }

    public function create(){
        $this->validate([
            'specialty.name' => 'required|string|max:30',
        ]);
        $slug = Str::slug($this->specialty->name);
        $existe = Specialty::where('slug', $slug)->count();
        if($existe > 0){
            $this->addError('unique', 'Specjalizacja już istnieje!');
        }else{
        
        $slug = Str::slug($this->specialty->name);
        $this->specialty->slug = $slug;
        // $page = new Page();
        // $page->name = $slug;
        // $page->title = $this->specialty->name;
        // $page->subtitle = 'Specjalizacje';
        // $page->meta_title = $this->specialty->name . ' | BodyClinic';
        // $page->save();
        // $this->specialty->page_id = $page->id;    
        $this->specialty->save();
        // $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $message = 'Dodano specjalizację ' . $this->specialty->name . '!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        $this->specialty = new Specialty();
        }    
    }

    public function selectedItem($id, $action){
        $specialty = Specialty::find($id);

        $this->specialty = $specialty;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'specialty-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $specialty->experts()->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'specialty-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->specialty->slug = Str::slug($this->specialty->name);
        $this->specialty->update();
        // $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        $this->specialty->name = null;
    }

    public function delete(){
        $specialty = $this->specialty;
        // $page = Page::find($specialty->page_id);
        // $page->delete();
        $specialty->delete();
        $message = 'Usunięto specjalizację!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('livewire.specialties', compact('specialties'));
    }
}
