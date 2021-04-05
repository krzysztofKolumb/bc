<?php

namespace App\Http\Livewire;

use App\Models\Clinic;
use App\Models\Treatment;
use Livewire\Component;

class Treatments extends Component
{

    public $clinics;
    public $action;
    public $selected;
    public $treatment;
    public $clinic_id='1';

    public function mount(){
        $this->clinics = Clinic::orderBy('name', 'asc')->get();
        $this->action = 'create';

    }

    protected $rules = [
        'treatment.name' => 'required|string',
        'treatment.price' => 'required|string',
        'treatment.clinic_id' => 'required'
    ];

    protected $messages = [
        'treatment.name.required' => 'To pole jest wymagane.',
        'treatment.name.string' => 'To pole może zawierać jedynie tekst.',
        'treatment.price.required' => 'To pole jest wymagane.',
        'treatment.price.string' => 'To pole może zawierać jedynie tekst.',
        'treatment.clinic_id.required' => 'To pole jest wymagane.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->treatment = new Treatment();
        $this->action = 'create';
        $message = 'treatment-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();
        $this->treatment->save();
        $message = 'Dodano zabieg!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        $this->treatment = new Treatment();
    }

    public function selectedItem($id, $action){
        $treatment = Treatment::find($id);
        $this->treatment = $treatment;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'treatment-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'treatment-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->treatment->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function delete(){
        $treatment = $this->treatment;
        $treatment->delete();
        $message = 'Usunięto zabieg!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }

    public function render()
    {
        // if($this->clinic_id == 'all'){
        //     $treatments = Treatment::orderBy('name', 'asc')->get();
        // }else{
            $treatments = Treatment::where('clinic_id', $this->clinic_id)->get();
        // }
        return view('livewire.treatments', compact('treatments'));
    }
}
