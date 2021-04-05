<?php

namespace App\Http\Livewire;

use App\Models\LabTestCategory;
use Livewire\Component;

class LabTestCategories extends Component
{
    public $category;
    public $action;
    public $canDelete = false;

    protected $rules = [
        'category.name' => 'required|string|max:50',
    ];

    protected $messages = [
        'category.name.required' => 'To pole jest wymagane.',
        'category.name.string' => 'To pole może zawierać jedynie tekst.',
        'category.name.max' => 'To pole może zawierać maksymalnie 50 znaków.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->category = new LabTestCategory();
        $this->action = 'create';
        $message = 'lab-test-category-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();
        $this->category->save();
        $message = 'Dodano kategorię!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->category->name = null;
    }

    public function selectedItem($id, $action){
        $category = LabTestCategory::find($id);
        $this->category = $category;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'lab-test-category-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $category->labTestPrices()->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'delete-lab-test-category-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->category->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function delete(){
        $category = $this->category;
        $category->delete();
        $message = 'Usunięto kategorię!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }

    public function render()
    {
        $categories = LabTestCategory::orderBy('name', 'asc')->get();
        return view('livewire.lab-test-categories', compact('categories'));
    }
}
