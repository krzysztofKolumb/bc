<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use Livewire\Component;
use Illuminate\Support\Str;

class Degrees extends Component
{
    public $degree;
    public $action;
    public $canDelete = false;

    public function mount(){
        $this->action = 'create';
    }

    protected $rules = [
        'degree.name' => 'required|string|max:30',
    ];

    protected $messages = [
        'degree.name.required' => 'To pole jest wymagane.',
        'degree.name.string' => 'To pole może zawierać jedynie tekst.',
        'degree.name.max' => 'To pole może zawierać maksymalnie 30 znaków.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->degree = new Degree();
        $this->action = 'create';
        $message = 'degree-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->degree->name = null;
    }


    public function create(){
        $this->validate();
        $name = $this->degree->name;
        $existe = Degree::where('name', $name)->count();
        if($existe > 0){
            $this->addError('unique', 'Stopień | Tytuł już istnieje!');
        }else {   
            $this->degree->save();
            $message = 'Dodano nowy tytuł | stopień!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        } 
    }

    public function selectedItem($id, $action){
        $degree = Degree::find($id);
        $this->degree = $degree;
        if($action == 'update'){
            $this->action = 'update';
            $message = 'degree-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $degree->experts()->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'degree-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function update(){
        $this->validate();
        $this->degree->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }

    public function delete(){
        $degree = $this->degree;
        $degree->delete();
        $message = 'Usunięto stopień | tytuł!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }



    public function render()
    {
        $degrees = Degree::orderBy('name', 'asc')->get();
        return view('livewire.degrees', compact('degrees'));
    }
}
