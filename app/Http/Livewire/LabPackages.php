<?php

namespace App\Http\Livewire;

use App\Models\LabPackage;
use Livewire\Component;

class LabPackages extends Component
{

    public $packages;
    public $selectedItem;

    protected $listeners = ['updateList'];

    public function mount(){
        $this->packages = LabPackage::all();
    }

    public function updateList(){
        $this->packages = LabPackage::all();
    }

    public function openDeleteModal($id){
        $selectedPackage = LabPackage::find($id);
        $this->selectedItem = $selectedPackage;

        $message = 'delete-lab-package-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);

    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function delete(){
        if($this->selectedItem){
            $toDelete = LabPackage::find($this->selectedItem->id);
            $toDelete->delete();
            $this->packages = LabPackage::all();
            $this->selectedItem = null;
            $message = 'Usunięto pakiet!';
            $this->dispatchBrowserEvent('close-delete-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        $packages = $this->packages;
        return view('livewire.lab-packages', compact('packages'));
    }
}
