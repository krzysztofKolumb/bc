<?php

namespace App\Http\Livewire;

use App\Models\ClinicalTrialCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ClinicalTrialCategories extends Component
{
    // public $selected;
    public $category;
    public $action;
    public $canDelete = false;

    public function mount(){
        $this->action = 'create';
    }

    protected $rules = [
        'category.title' => 'required|string|max:30',
    ];

    protected $messages = [
        'category.title.required' => 'To pole jest wymagane.',
        'category.title.string' => 'To pole może zawierać jedynie tekst.',
        'category.title.max' => 'To pole może zawierać maksymalnie 30 znaków.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->category = new ClinicalTrialCategory();
        $this->action = 'create';
        $message = 'ct-category-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function cancel(){
        $this->category->title = null;
    }

    public function create(){
        $this->validate();
        $title = $this->category->title;
        $slug = Str::slug($this->category->title);
        $existe = ClinicalTrialCategory::where('title', $title)->count();
        if($existe > 0){
            $this->addError('unique', 'Kategoria już istnieje!');
        }else {   
            $this->category->slug=$slug;
            $this->category->save();
            $message = 'Dodano kategorię!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        } 
    }

    public function selectedItem($id, $action){
        $category = ClinicalTrialCategory::find($id);
        $this->category = $category;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'ct-category-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $count = $category->clinicalTrials->count();
            $this->canDelete = ( $count > 0 ? false : true );
            $message = 'ct-category-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $title = $this->category->title;
        $slug = Str::slug($this->category->title);
        $existe = ClinicalTrialCategory::where('title', $title)->count();
        if($existe > 0){
            $this->addError('unique', 'Kategoria już istnieje!');
        }else {   
            $this->category->slug=$slug;
            $this->category->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        } 
    }

    public function delete(){
        $category = $this->category;
        $category->delete();
        $message = 'Usunięto kategorię!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        $categories = ClinicalTrialCategory::orderBy('title', 'asc')->get();
        return view('livewire.clinical-trial-categories', compact('categories'));
    }
}
