<?php

namespace App\Http\Livewire;

use App\Models\Clinic;
use Livewire\Component;

class Clinics extends Component
{
    public $clinic;
    public $action;
    public $canDelete = false;

    protected $rules = [
        'clinic.name' => 'required|string',
    ];

    protected $messages = [
        'clinic.name.required' => 'To pole jest wymagane.',
        'clinic.name.string' => 'To pole może zawierać jedynie tekst.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->clinic = new Clinic();
        $this->action = 'create';
        $message = 'clinic-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();
        $this->clinic->save();
        $message = 'Dodano pracownię | poradnię!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->category->name = null;
    }

    public function selectedItem($id, $action){
        $clinic = Clinic::find($id);
        $this->clinic = $clinic;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'clinic-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $clinic->treatments->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'clinic-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->clinic->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function delete(){
        $clinic = $this->clinic;
        $clinic->delete();
        $message = 'Usunięto pomyślnie!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }

    public function render()
    {
        $clinics = Clinic::orderBy('name', 'asc')->get();
        return view('livewire.clinics', compact('clinics'));
    }

}
