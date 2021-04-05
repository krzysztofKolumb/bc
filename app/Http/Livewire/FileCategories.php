<?php

namespace App\Http\Livewire;

use App\Models\FileCategory;
use Livewire\Component;

class FileCategories extends Component
{
    public $category;
    public $action;
    public $canDelete = false;

    protected $rules = [
        'category.name' => 'required|string',
    ];

    protected $messages = [
        'category.name.required' => 'To pole jest wymagane.',
        'category.name.string' => 'To pole może zawierać jedynie tekst.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->category = new FileCategory();
        $this->action = 'create';
        $message = 'file-category-modal';
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
        $category = FileCategory::find($id);
        $this->category = $category;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'file-category-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $category->files->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'file-category-delete-modal';
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
        $categories = FileCategory::orderBy('name', 'asc')->get();
        return view('livewire.file-categories', compact('categories'));
    }
}
