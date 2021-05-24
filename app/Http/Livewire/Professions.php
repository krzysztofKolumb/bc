<?php

namespace App\Http\Livewire;

use App\Models\Profession;
use Livewire\Component;

class Professions extends Component
{
    public $profession;
    public $action;
    public $canDelete = false;

    public function mount(){
        $this->action = 'create';
    }

    protected $rules = [
        'profession.name' => 'required|string|max:30',
        'profession.team' => 'required|string|max:30',
        'profession.type' => 'required'
    ];

    protected $messages = [
        'profession.name.required' => 'To pole jest wymagane.',
        'profession.name.string' => 'To pole może zawierać jedynie tekst.',
        'profession.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'profession.team.required' => 'To pole jest wymagane.',
        'profession.team.string' => 'To pole może zawierać jedynie tekst.',
        'profession.team.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'profession.type.required' => 'To pole jest wymagane.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->profession = new Profession();
        $this->action = 'create';
        $message = 'profession-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->profession->name = null;
        $this->profession->team = null;
        $this->profession->type = null;
    }

    public function create(){

        $this->validate();
        $name = $this->profession->name;
        $existe = Profession::where('name', $name)->count();
        if($existe > 0){
            $this->addError('unique', 'Zawód już istnieje!');
        }else{
            $this->profession->save();
            $message = 'Dodano zawód !';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }    
    }

    public function selectedItem($id, $action){
        $profession = Profession::find($id);
        $this->profession = $profession;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'profession-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $profession->experts()->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'profession-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function update(){
        $this->validate();
        $name = $this->profession->name;
        $existe = Profession::where('name', $name)->count();
        if($existe > 0){
            $this->addError('unique', 'Zawód już istnieje!');
        }else{
            $this->profession->update();
            $message = 'Zapisano zmiany !';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }  
    }

    public function delete(){
        $profession = $this->profession;
        $profession->delete();
        $message = 'Usunięto zawód!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        $professions = Profession::all();
        return view('livewire.professions', compact('professions'));
    }
}
