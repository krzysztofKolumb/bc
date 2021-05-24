<?php

namespace App\Http\Livewire;

use App\Models\LabPackage;
use Livewire\Component;

class LabPackages extends Component
{
    public $package;
    public $action;

    public function mount(){
        $this->action = 'create';
    }

    protected $listeners = ['store'];

    protected $rules = [
        'package.title' => 'required|string|max:400',
        'package.content' => 'string',
        'package.price' => 'required|string|max:100'

    ];

    protected $messages = [
        'package.title.required' => 'To pole jest wymagane.',
        'package.title.string' => 'To pole może zawierać jedynie tekst.',
        'package.title.max' => 'To pole może zawierać maksymalnie 200 znaków.',
        'package.price.required' => 'To pole jest wymagane.',
        'package.content' => 'To pole może zawierać jedynie tekst.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->package = new LabPackage();
        $this->action = 'create';
        $message = 'lab-package-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $package = LabPackage::find($id);
        $this->package = $package;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'lab-package-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'lab-package-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function store($title, $price, $content){
        $this->package->title = $title;
        $this->package->price = $price;
        $this->package->content = $content;
        $this->validate();
        if($this->action == 'create'){
            $this->package->save();
            $message = 'Dodano pakiet!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
        if($this->action == 'update'){
            $this->package->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function delete(){
        if($this->package){
            $this->package->delete();
            $message = 'Usunięto pakiet!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }








    // public function openDeleteModal($id){
    //     $selectedPackage = LabPackage::find($id);
    //     $this->selectedItem = $selectedPackage;

    //     $message = 'delete-lab-package-modal';
    //     $this->dispatchBrowserEvent('open-modal', ['message' => $message]);

    // }



    // public function delete(){
    //     if($this->selectedItem){
    //         $toDelete = LabPackage::find($this->selectedItem->id);
    //         $toDelete->delete();
    //         $this->packages = LabPackage::all();
    //         $this->selectedItem = null;
    //         $message = 'Usunięto pakiet!';
    //         $this->dispatchBrowserEvent('close-delete-modal', ['message' => $message]);
    //     }
    // }

    public function render()
    {
        $packages = LabPackage::all();
        return view('livewire.lab-packages', compact('packages'));
    }
}
