<?php

namespace App\Http\Livewire;

use App\Models\ClinicalTrialCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ClinicalTrialCategories extends Component
{

    public $categories;
    public $selected;
    public $category;
    public $canDelete = false;

    public function mount(){
        $this->categories = ClinicalTrialCategory::orderBy('title', 'asc')->get();
        $this->category = new ClinicalTrialCategory();
    }

    protected $rules = [
        'clinicalTrialCategory.title' => 'required|string|max:30',
        'category.title' => 'required|string|max:30',
        'selected.title' => 'required|string|max:30',
    ];

    protected $messages = [
        'clinicalTrialCategory.title.required' => 'To pole jest wymagane.',
        'clinicalTrialCategory.title.string' => 'To pole może zawierać jedynie tekst.',
        'clinicalTrialCategory.title.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'selected.title.required' => 'To pole jest wymagane.',
        'selected.title.string' => 'To pole może zawierać jedynie tekst.',
        'selected.title.max' => 'To pole może zawierać maksymalnie 30 znaków.',
    ];

    public function create(){
        $this->validate([
            'category.title' => 'required|string|max:30',
        ]);
        $title = $this->category->title;
        $slug = Str::slug($this->category->title);
        $ex = ClinicalTrialCategory::where('title', $title)->count();
        if($ex > 0){
            $this->addError('unique', 'Kategoria już istnieje!');
        }else {   
            $this->category->slug=$slug;
            $this->category->save();
            $this->categories=ClinicalTrialCategory::orderBy('title', 'asc')->get();
            $this->category = new ClinicalTrialCategory();
            $message = 'Dodano kategorię!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        } 
    }

    public function selectedItem($id, $action){
        $category = ClinicalTrialCategory::find($id);
        $this->selected = $category;

        if($action == 'update'){
            $message = 'edit-ct-categories-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            if($category->clinicalTrials->count() < 1){
                $this->canDelete=true;
            }else{
                $this->canDelete=false;
            }
            $message = 'delete-ct-categories-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate([
            'selected.title' => 'required|string|max:30',
        ]);
        $title = $this->selected->title;
        $slug = Str::slug($this->selected->title);
        $ex = ClinicalTrialCategory::where('title', $title)->count();
        if($ex > 0){
            $this->addError('unique', 'Kategoria już istnieje!');
        }else {   
            $this->selected->slug=$slug;
            $this->selected->update();
            $this->categories=ClinicalTrialCategory::orderBy('title', 'asc')->get();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        } 
    }

    public function delete(){
        $category = $this->selected;
        $category->delete();
        $this->categories = ClinicalTrialCategory::orderBy('title', 'asc')->get();
        $message = 'Usunięto kategorię!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }

    public function cancel(){
        $this->category->title = null;
    }

    public function render()
    {
        return view('livewire.clinical-trial-categories');
    }
}
